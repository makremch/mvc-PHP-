<form>
    <input type="text" name="name" placeholder="search" id="recherche_promotion" onkeyup="recherchePromotion();">
    <p id="text_loding"></p>
</form>

<div class="box-body">
<div id="content_table">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>

            <th class="success">Id Promotion </th>
            <th class="danger">Nom Promotion </th>
            <th>Reduction </th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>

<?php
foreach ($promotions as &$value) { ?>

    <tr>
            <td><class="success"><?php echo $value['IdPromotion']?></td>
            <td class="danger"><?php echo $value['NomPromotion']?></td>
            <td> <?php echo $value['Reduction']?> </td>
            <td>
                <a href="<?php echo $request->getWebroot(); ?>promotions/afficher/id:<?php echo $value['IdPromotion']; ?>" class="btn btn-info">Afficher</a>
                <a href="" onclick="getPromotion(<?php echo $value['IdPromotion']; ?>); return false;" class="btn btn-success">Modifier</a>
                <a href="" onclick="DeletePromotion(<?php echo $value['IdPromotion']; ?>); return false;" class="btn btn-danger">Supprimer</a>
            </td>

    </tr>

        <?php } ?>
        </tbody>
    </table>
</div>

</div>






<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Reduction</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="email">Nom Promotion : </label>
                        <input type="text" class="form-control" id="nomPromotion" value="">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Reduction:</label>
                        <input type="text" class="form-control" id="reductionPromotion" value="">
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

    function recherchePromotion(){
        setTimeout(function validate(){
        var cle=$('#recherche_promotion').attr('value');
        $.ajax({url: "<?php echo $request->getWebroot(); ?>promotions/rechercheAjax",
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

                htmlVar +='<th class="success">Id Promotion </th>';
                htmlVar +='<th class="danger">Nom Promotion </th>';
                htmlVar +='<th>Reduction </th>';
                htmlVar +='<th>Action</th>';

                htmlVar +='</tr>';
                htmlVar +='</thead>';
                htmlVar +='<tbody>';
                jQuery.each(result, function(i, val) {
                        htmlVar +='<tr><td>'+val.id+'</td>';
                       htmlVar += '<td>'+val.nom+'</td>';
                       htmlVar +='<td>'+val.reduction+'</td>';
                       htmlVar +='<td>';
                       htmlVar +='<a href="<?php echo $request->getWebroot(); ?>promotions/afficher/id:'+val.id+'" class="btn btn-info">Afficher</a>';
                       htmlVar +='<a href="" onclick="getPromotion('+val.id+'); return false;" class="btn btn-success">Modifier</a>';
                       htmlVar +='<a href="" onclick="DeletePromotion('+val.id+'); return false;" class="btn btn-danger">Supprimer</a>';
                       htmlVar +='</td>';
                       htmlVar +='</tr>';
                });
                htmlVar +='</tbody></table>';

                $('#content_table').html(htmlVar);

            }});

            },2000);
    }


    function getPromotion(id){
        $.ajax({url: "<?php echo $request->getWebroot(); ?>promotions/afficherAjax/id:"+id,
            dataType:'JSON',
            success: function(result){
            $('#nomPromotion').attr('value',result.nom);
            $('#reductionPromotion').attr('value',result.reduction);
            $('#btn_save').attr('onclick','EditPromotion('+id+');');


            $('#myModal').modal("show");
        }});

    }

    //dataType : Json : sert a connaitre le type de donnees
    function EditPromotion(id){
        $.ajax({url: "<?php echo $request->getWebroot(); ?>promotions/editAjax/id:"+id,
            dataType:'text',
            type:'POST',
            data:{'nomPromotion':$('#nomPromotion').attr('value'),'Reduction':$('#reductionPromotion').attr('value')},
            success: function(result){
                if(result=='ok'){
                    location.reload();
                }
            }});

    }

    function DeletePromotion(id)
    {
        var conf=confirm("est ce que vous voulez supprimer cette promotion ?");
        if(conf)
        {
            $.ajax({
                url: "<?php echo $request->getWebroot(); ?>promotions/deleteAjax/id:"+id, // create urls properly
                type: "GET",
                dataType: 'text',
                data:{},
                success: function (result) {
                    if (result=="ok") {
                        alert("La promotion a été supprimée."); //your success callback logic goes here
                        location.reload();
                    }
                }
            });
        }
    }




</script>