
<div class="box-body">

    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>

            <th class="success">Id Promotion </th>
            <th class="danger">Nom Promotion </th>
            <th>Reduction </th>

        </tr>
        </thead>
        <tbody>
        <tr>

            <td><echo  class="success"><?php echo $promotions[0]['IdPromotion']?></td>
            <td class="danger"><?php echo $promotions[0]['NomPromotion']?></td>
            <td><?php echo $promotions[0]['Reduction']?></td>

        </tr>
        </tbody>
    </table>

</div>

