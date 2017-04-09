
<div class="box-body">

    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>

            <th class="success">Id Event </th>
            <th class="act-danger">Nom Event </th>
            <th class="act-danger">Date event </th>
            <th class="act-success">Description</th>
            <th class="act-danger">video</th>

        </tr>
        </thead>
        <tbody>
        <tr>

            <td><echo  class="success"><?php echo $event[0]['IdEvent']?></td>
            <td class="danger"><?php echo $event[0]['NomEvent']?></td>
            <td><?php echo $event[0]['DateEvent']?></td>
            <td><?php echo $event[0]['Description']?></td>
            <td><?php echo $event[0]['video']?></td>

        </tr>
        </tbody>
    </table>

</div>

