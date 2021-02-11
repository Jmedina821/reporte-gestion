<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\DB;

class Report extends Model
{
  //protected $connection= 'pgsql';
  public function dataaallctivityproject($project)
  {
    $id = "'" . $project . "'";
    //dd(' SELECT * FROM activity as act where act."projectId"='.$id);
    $result = DB::select(' SELECT * FROM activities as act where act."project_id"=' . $id);
    return $result;
  }
  public function dataactivity($parameter)
  {
    $id = $parameter == 'none' ? "'6f87f4b2-6af4-4d47-844f-7d60ce693be2'" : "'" . $parameter . "'";
    $result = DB::select('
 SELECT act.id as act_id, 
act.name as act_name, 
act.description as act_description, 
act.gobernador as act_gobernador, 
act.conclusion as act_conclusion, 
act.address as act_address, 
act."init_date" as act_initDate, 
act."end_date" as act_endDate, 
act."estimated_population" as act_estimatedPopulation, 
act."benefited_population" as act_benefitedPopulation, 
act.lat as act_latitude, 
act.lng as act_longitude, 
act."project_id" as act_projectId, 
parr."municipio_id" as act_municipioId, 
act."parroquia_id" as act_parroquiaId,
    proj.name as project_name,
    prog.name as program_name,
    mun.name as municipio_name,
    parr.name as parroquia_name
 
   FROM activities as act
   LEFT JOIN projects as proj ON proj.id = act."project_id"
   LEFT JOIN programs as prog ON prog.id = proj."program_id"
   LEFT JOIN parroquias as parr ON parr.id = act."parroquia_id"
   LEFT JOIN municipios as mun ON mun.id = parr."municipio_id"
   where act.id=' . $id . ' limit 1');
    return $result;
  }
  public function dataproject($parameter)
  {
    $id = $parameter == 'none' ? "'b56bbb76-0d61-4ccd-a030-eb9aa648c424'" : "'" . $parameter . "'";
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
from projects AS proj 
LEFT JOIN programs as prog ON prog.id = proj."program_id"
LEFT JOIN project_statuses as status on status.id = proj."project_status_id"
LEFT JOIN measurements as mea on mea.id = proj."measurement_id"
LEFT JOIN activities as act on act."project_id" = proj.id
 where proj.id=' . $id . ' limit 1');
    return $result;
  }
}
