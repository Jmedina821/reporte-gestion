<table style="width: 100%">
    <tr>        
        <td style="width:50%;"></th>
        <th style="width:50%;"> <span >
                <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($data[0]->act_id, 'QRCODE')}}"  style="width: 2.5cm; height:2.5cm;background-color: #ffffff; margin-right: -200px !important " />
            </span></th>
    </tr>
</table>
<table style="width: 100%">
    <tr>        
        <td style="width:50%;">
        	<table>
        			<tr>
        				<td> <strong>Nombre de Actividad:</strong>{{$data[0]->act_name}} </td>
        			</tr>
        			<tr>
        				<td><strong>Municipio:</strong> {{$data[0]->municipio_name}}</td>
        			</tr>
        			<tr>
        				<td><strong>Parroquia:</strong> {{$data[0]->parroquia_name}}</td>
        			</tr>
        			<tr>
        				<td><strong>Direccion:</strong>{{$data[0]->act_address}} </td>
        			</tr>
        			<tr>
        				<td><strong>Fecha Inicio:</strong> {{$data[0]->act_initdate}}</td>
        			</tr>
        			<tr>
        				<td><strong>Fecha Fin:</strong> {{$data[0]->act_enddate}}</td>
        			</tr>
        		
        	</table>
        </td>
        <td style="width:50%;">
        	<table>
        			<tr>
        				<td><strong>Nombre de Programa:</strong>{{$data[0]->program_name}} </td>
        			</tr>
        			<tr>
        				<td><strong>Nombre Proyecto:</strong> {{$data[0]->project_name}}</td>
        			</tr>
        			<tr>
        				<td><strong>Poblacion Beneficiada:</strong> {{$data[0]->act_benefitedpopulation}}</td>
        			</tr>
        			<tr>
        				<td><strong>Va asistir el Governador:</strong> {{$data[0]->act_gobernador ? 'SI' : 'NO'}}</td>
        			</tr>
        		
        	</table>
        </td>
    </tr>
    <tr>        
        <TD style="width:100%;"> <strong>Descripcion de la Actividad:</strong>{{$data[0]->act_description}}</td>
    
    </tr>
</table>
	
	