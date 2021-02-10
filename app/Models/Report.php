<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\DB;

class Report extends Model
{
     //protected $connection= 'pgsql';
    public function dataactivity($parameter)
    {
     $id= $parameter=='none' ? "'6f87f4b2-6af4-4d47-844f-7d60ce693be2'" : "'".$parameter."'";
    $result = DB::select('
 SELECT act.id as act_id, 
act.name as act_name, 
act.description as act_description, 
act.gobernador as act_gobernador, 
act.conclusion as act_conclusion, 
act.address as act_address, 
act."initDate" as act_initDate, 
act."endDate" as act_endDate, 
act."estimatedPopulation" as act_estimatedPopulation, 
act."benefitedPopulation" as act_benefitedPopulation, 
act.latitude as act_latitude, 
act.longitude as act_longitude, 
act."projectId" as act_projectId, 
act."municipioId" as act_municipioId, 
act."parroquiaId" as act_parroquiaId,
    proj.name as project_name,
    prog.name as program_name,
    mun.name as municipio_name,
    parr.name as parroquia_name
 
   FROM activity as act
   LEFT JOIN project as proj ON proj.id = act."projectId"
   LEFT JOIN program as prog ON prog.id = proj."programId"
   LEFT JOIN municipio as mun ON mun.id = act."municipioId"
   LEFT JOIN parroquia as parr ON parr.id = act."parroquiaId" where act.id='.$id.' limit 1');
        return $result;
    }

}
