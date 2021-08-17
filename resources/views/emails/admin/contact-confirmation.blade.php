<h4>Solicitud de contacto web</h4>
<table cellspacing="0" style="width: 300px; height: 200px;">
    <tr>
        <th>Nombre:</th><td>{{$contact->name}}</td>
    </tr>
    <tr style="background-color: #e0e0e0;">
        <th>Email:</th><td>{{$contact->email}}</td>
    </tr>
    <tr style="background-color: #e0e0e0;">
        <th>Teléfono:</th><td>{{$contact->phone}}</td>
    </tr>
    <tr>
        <th>Asunto:</th><td>{{$contact->subject}}</td>
    </tr>
    <tr>
        <th>Mensaje:</th><td>{{$contact->message}}</td>
    </tr>
</table>
