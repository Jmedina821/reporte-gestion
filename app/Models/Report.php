<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\DB;

class Report extends Model
{
     //protected $connection= 'pgsql';
    public function dataaallctivityproject($project){
      $id= "'".$project."'";
      //dd(' SELECT * FROM activity as act where act."projectId"='.$id);
      $result = DB::select(' SELECT * FROM activity as act where act."projectId"='.$id);
      return $result;

    }
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
    public function dataproject($parameter)
    {
     $id= $parameter=='none' ? "'b56bbb76-0d61-4ccd-a030-eb9aa648c424'" : "'".$parameter."'";
    $result = DB::select('SELECT 
      proj.id as project_id,
  proj.name as project_name,
  proj.description as proj_description,
  status.name as status_name,
  mea.name as measurement_name,
  act.name as activity_name,
  act.address as activity_address,
  prog.name as prog_name,
  act.* as _act
from project AS proj 
LEFT JOIN program as prog ON prog.id = proj."programId"
LEFT JOIN project_status as status on status.id = proj."statusId"
LEFT JOIN measurement as mea on mea.id = proj."measurementId"
LEFT JOIN activity as act on act."projectId" = proj.id
 where proj.id='.$id.' limit 1');
        return $result;
    }

}
