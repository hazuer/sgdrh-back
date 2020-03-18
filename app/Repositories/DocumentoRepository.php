<?php

namespace App\Repositories;

use App\Models\ExpedienteDocModel;
use Storage;

class DocumentoRepository
{
    public function getDocumentosByIdExpediente($request)
    {

        $q = ExpedienteDocModel::where([
            ['id_expediente', $request->id_expediente],
            ['id_estatus', 1]
        ])
        ->get();

        if (count($q)===0)
            throw new \Exception('Expediente no encontrado.');

        return $q;
    }

    public function store($request)
    {
        return \DB::transaction(function () use ($request) {

            $id_expediente  = $request->id_expediente;
            $id_cat_doc     = $request->id_cat_doc;
            $file_name      = str_replace(" ","_",$request->file_name);
            $file_name      = str_replace("-","",$file_name);
            $file_mime_type = $request->file_mime_type;

            // Tamaño del archivo, Max 5000000 bytes ==5MB
            if($request->file_size>5000000)
                return ["code" => 2, "message"=> "El documento no se puede adjuntar debido a que supera los 5 MB permitidos."];

            //Extensión del archivo
            if($request->id_cat_doc!=1)
            {
                if($file_mime_type!="application/pdf"){
                    return ["code" => 3, "message"=> "El documento no se puede adjuntar debido a que no cumple con el formato permitido: PDF."];
                }
            }else{

                $array_mime_type = ["image/png",
                "image/jpeg",
                "image/gif",
                "image/x-ms-bmp",
                "image/bmp",
                "application/postscript"];
                if (!in_array($file_mime_type, $array_mime_type)){
                    return ["code" => 3, "message"=> "El documento no se puede adjuntar debido a que no cumple con los formatos permitidos: jpg, jpeg, png, bmp, gif, ai"]; 
                }
            }

            $q = ExpedienteDocModel::where([
            ['id_expediente', $id_expediente],
            ['id_cat_doc', $request->id_cat_doc],
            ['id_estatus', 1]
            ])
            ->get();

            if (count($q)===1)
                return ["code" => 4, "message"=> "Documento duplicado."];

            // Base de datos
            $record                = new ExpedienteDocModel();
            $record->id_expediente = $id_expediente;
            $record->id_cat_doc    = $id_cat_doc;
            $record->id_estatus    = 1;
            $record->name_file     = "";
            $record->save();
            $id_exp_doc = $record->id_exp_doc;

            // Documentos
            $path_folder     = "expediente_".$id_expediente;
            $archivo         = $id_exp_doc."_".$id_expediente."_".$id_cat_doc."_".$file_name;
            $archivo_binario = base64_decode($request->file_binary_b64);

            $upDoc            = ExpedienteDocModel::find($id_exp_doc);
            $upDoc->name_file = $archivo;
            $upDoc->save();

            Storage::disk('public_uploads')->put("/".$path_folder."/".$archivo, $archivo_binario);

            #return ['id_exp_doc' => $id_exp_doc];
            return ["code" => 1, "message"=> "Éxito."];
        });
    }

    public function destroy($request)
    {
        return \DB::transaction(function () use ($request) {
            $record = ExpedienteDocModel::findOrFail($request->id_exp_doc);

            $path_folder = "expediente_".$record->id_expediente;
            $archivo = $record->name_file;

            Storage::disk('public_uploads')->delete("/".$path_folder."/".$archivo);

            $record->delete();

            });
    }
}
