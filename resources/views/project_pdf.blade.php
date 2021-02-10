<table style="width: 100%">
    <tr>        
        <td style="width:50%;"></th>
        <th style="width:50%;"> <span >
                <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($data[0]->project_id, 'QRCODE')}}"  style="width: 2.5cm; height:2.5cm;background-color: #ffffff; margin-right: -200px !important " />
            </span></th>
    </tr>
</table>






<table style="width: 100%">
	<tr>        
        <TD colspan="3"  style="width:100%;"> <strong>Proyecto:</strong>{{$data[0]->project_name}}</td>
    
    </tr>
    <tr>        
        <td colspan="3" style="width:100%;"> <strong>Programa:</strong>{{$data[0]->prog_name}}</td>
    
    </tr>
    <tr>        
        <td style="width:100%;"> <strong>Inicio:</strong>{{$data[0]->prog_name}}</td>
        <td style="width:100%;"> <strong>Status:</strong>{{$data[0]->status_name ? 'Activo' : 'Inactivo' }}</td>
        <td style="width:100%;"> <strong>Unidad de medida:</strong>{{$data[0]->measurement_name}}</td>
    
    </tr>
    <tr>        
        <td style="width:100%;"> <strong>Inicio:</strong>{{$data[0]->prog_name}}</td>
        <td style="width:100%;"> <strong>Status:</strong>{{$data[0]->status_name }}</td>
        <td style="width:100%;"> <strong>Unidad de medida:</strong>{{$data[0]->measurement_name}}</td>
    
    </tr>

    <tr>        
        <td colspan="3" style="width:100%;"> <strong>Descripcion:</strong>{{$data[0]->proj_description}}</td>    
    </tr>






 
</table>
<table >
	<tr>        
        <td colspan="3" style="width:100%; text-align: center;border: 1px solid black"> <strong>Actividades</strong></td>    
    </tr>
	 @foreach($activity as $value)
	<tr>        
        <td  style="width:100%;"> <strong>Nombre:</strong>{{$value->name}}</td>    
        <td  style="width:100%;"> <strong>Fecha:</strong>{{$value->initDate}}</td>    
        <td  style="width:100%;"> <strong>Descripcion:</strong>{{$value->description}}</td>    
    </tr>
    @endforeach

</table>
	
