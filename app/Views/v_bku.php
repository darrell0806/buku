<style>
  #datatable-buttons {
    width: 76%;
    margin: auto;
    border-collapse: collapse;
    border: 1px solid black; 
  }

  #datatable-buttons th,
  #datatable-buttons td {
    padding: 8px;
    border: 1px solid black; 
  }

  #datatable-buttons th {
    background-color: white;
    color: black;
    text-align: center;
  }

  #datatable-buttons tbody tr:nth-child(odd) {
    background-color: #f2f2f2;
  }

  #datatable-buttons tbody tr:hover {
    background-color: #ddd;
  }
</style>


<table id="datatable-buttons" border="1" width="76%" class="table table-striped table-bordered">
  
  <thead>
    <tr>
    <th>No</th>
                       
                        <th>Nama Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                       
    </tr>
  </thead>


  <tbody>
  <?php
$no = 1;

foreach ($duar as $b) {
?>
  <tr>
  <td><?php echo $no++ ?></td>
 
                                        <td><?php echo $b->nama_b?> </td>
                                        <td><?php echo $b->penulis?> </td>
                                        <td><?php echo $b->penerbit?> </td>
                                        <td><?php echo $b->tahun?> </td>
                                        <td><?php echo $b->stok?> </td>
                                        <td><?php echo $b->nama_k?> </td>
                                      
  </tr>
<?php
} ?>


  </tbody>
</table>
</div>

<script>
  window.print();
</script>