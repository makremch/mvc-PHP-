
<form>
    <input type="text" name="name" placeholder="search" id="recherche_event" onkeyup="rechercheEvent();">

</form>

<div class="box-body">

    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>

            <th class="success">Id Event </th>
            <th class="danger">Nom Event </th>
            <th class="success">Date </th>
            <th class="act-danger">Description</th>
            <th class="success"> Video </th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>

        <?php

        foreach ($event as &$value) {  ?>

            <tr>
                <td> <?php echo $value['IdEvent']?> </td>
                <td> <?php echo $value['NomEvent']?> </td>
                <td> <?php echo $value['DateEvent']?> </td>
                <td> <?php echo $value['Description']?> </td>
                <td> <?php echo $value['video']?></td>

                <td>
                    <a href="<?php echo $request->getWebroot(); ?>event/AfficherEvent/id:<?php echo $value['IdEvent']; ?>" class="btn btn-info">Afficher</a>
                    <a href="" onclick="getEvent(<?php echo $value['IdEvent']; ?>); return false;" class="btn btn-success">Modifier</a>
                    <a href="" onclick="DeleteEvent(<?php echo $value['IdEvent']; ?>); return false;" class="btn btn-danger">Supprimer</a>
                </td>

            </tr>

        <?php } ?>
        </tbody>
    </table>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Evennement </h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nomEvent">Nom Event : </label>
                        <input type="text" class="form-control" id="nomEvent" value="">
                    </div>
                    <div class="form-group">
                        <label for="dateEvent">Date Event :</label>
                        <input type="date" class="form-control" id="dateEvent" value="">
                    </div>
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <input type="text" class="form-control" id="description" value="">
                    </div>
                    <div class="form-group">
                        <label for="dateEvent">Video :</label>
                        <input type="text" class="form-control" id="video" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_save" onclick="">Save changes</button>
            </div>
        </div>
    </div>
</div>



<script>

    function rechercheEvent(){
        setTimeout(function validate(){
            var cle=$('#recherche_event').attr('value');
            $.ajax({url: "<?php echo $request->getWebroot(); ?>event/rechercheAjax",
                dataType:'JSON',
                type:'POST',
                data:{'cle':cle},
                beforeSend:function(){
                    $('#text_loding').text('Loading...');
                },
                error: function(){
                    alert('error');
                },
                success: function(result){
                    $('#text_loding').text('');
                    var htmlVar='<table id="example2" class="table table-bordered table-hover">';
                    htmlVar +='<thead>';
                    htmlVar +='<tr>';

                    htmlVar +='<th class="success">Id Event </th>';
                    htmlVar +='<th class="danger">Nom Event </th>';
                    htmlVar +='<th>Date Event </th>';
                    htmlVar +='<th>Description </th>';
                    htmlVar +='<th>Video </th>';
                    htmlVar +='<th>Action</th>';

                    htmlVar +='</tr>';
                    htmlVar +='</thead>';
                    htmlVar +='<tbody>';
                    jQuery.each(result, function(i, val) {
                        htmlVar +='<tr><td>'+val.id+'</td>';
                        htmlVar += '<td>'+val.nom+'</td>';
                        htmlVar +='<td>'+val.date+'</td>';
                        htmlVar +='<td>'+val.description+'</td>';
                        htmlVar +='<td>'+val.video+'</td>';
                        htmlVar +='<td>';
                        htmlVar +='<a href="<?php echo $request->getWebroot(); ?>event/afficher/id:'+val.id+'" class="btn btn-info">' Afficher </a>';
                        htmlVar +='<a href="" onclick="getEvent('+val.id+'); return false;" class="btn btn-success">Modifier</a>';
                        htmlVar +='<a href="" onclick="DeleteEvent('+val.id+'); return false;" class="btn btn-danger">Supprimer</a>';
                        htmlVar +='</td>';
                        htmlVar +='</tr>';
                    });
                    htmlVar +='</tbody></table>';

                    $('#content_table').html(htmlVar);

                }});

        },2000);
    }







    function getEvent(IdEvent){
        $.ajax({url: "<?php echo $request->getWebroot(); ?>event/afficherAjax/id:"+IdEvent,
            dataType:'JSON',
            success: function(result){
                $('#nomEvent').attr('value',result.NomEvent);
                $('#dateEvent').attr('value',result.DateEvent);
                /*
                $('#description').attr('value',result.Description);
                $('#video').attr('value',result.video);
                */
                $('#btn_save').attr('onclick','editEvent('+IdEvent+');');

                $('#myModal').modal("show");
            }});

    }

    //dataType : Json : sert a connaitre le type de donnees
    function editEvent(IdEvent){
        $.ajax({url: "<?php echo $request->getWebroot(); ?>event/editAjax/id:"+IdEvent,
            dataType:'text',
            type:'POST',
            data:{'NomEvent':$('#nomEvent').attr('value'),'DateEvent':$('#dateEvent').attr('value'),
            'Description':$('#description').attr('value'),'video':$('#video').attr('value')},
            success: function(result){
                if(result=='ok'){
                    location.reload();
                }
            }});

    }

    function DeleteEvent(IdEvent)
    {
        var conf=confirm("est ce que vous voulez supprimer cet Event ?");
        if(conf)
        {
            $.ajax({
                url: "<?php echo $request->getWebroot(); ?>event/deleteAjax/id:"+IdEvent, // create urls properly
                type: "GET",
                dataType: 'text',
                data:{},
                success: function (result) {
                    if (result=="ok") {
                        alert("L'event a été supprimé."); //your success callback logic goes here
                        location.reload();
                    }
                }
            });
        }
    }


</script>