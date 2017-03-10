<div class="row">
    <div class="col-md-10">
        <h1 class="page-header">Instagram</h1>
    </div>
    <div class="col-md-2 cog-list">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL; ?>/admin/instagram/dump">Dump Images from Instagram</a></li>
        </ul>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $count = 1;
        foreach($instagram_images as $instagram_image) {
            echo '<tr>';
            echo '<td>'.$instagram_image->id.'</td>';
            echo '<td>'.$instagram_image->title.'</td>';
            echo '<td><a data-toggle="modal" data-target="#myModal'.$count.'" class="btn btn-info" href="#">View</a></td>';
            echo '<td><a class="btn btn-warning" href="'.BASE_URL.'/admin/instagram/edit/'.$instagram_image->id.'">Edit</a></td>';
            echo '<td><a class="delete btn btn-danger" href="'.BASE_URL.'/admin/instagram/delete/'.$instagram_image->id.'">Delete</a></td>';
            echo '</tr>';
            echo '<div id="myModal'.$count.'" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">'.$instagram_image->title.' | '.$instagram_image->created_time.'</h4>
      </div>
      <div class="modal-body">
        <img class="img-responsive center-block" src="'.BASE_URL.'/uploads/instagram/lg/'.$instagram_image->image.'" alt="'.$instagram_image->title.'" />
        <p><div class="label label-default">Description</div></br>'.$instagram_image->title.' | '.$instagram_image->created_time.'</p>
        <p><div class="label label-default">Link to Instagram post</div></br><a href="'.$instagram_image->link.'" target="_blank">'.$instagram_image->link.'</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>';
        }
        ?>
        </tbody>
    </table>
</div>
<ul class="pagination">
    <?php
    echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
    echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
    echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
    ?>
</ul>