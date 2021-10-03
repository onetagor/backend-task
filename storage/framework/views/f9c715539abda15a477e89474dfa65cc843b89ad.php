

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Category Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">News Items</a>
                </li>
            </ul><!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        <div class=" mt-1 mb-1 text-right">
                                <button class="btn btn-large btn-success" onclick="openForm()">Add category</button>
                        </div>
                        <div class='col-md-12'>
                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <td>id</td>
                                        <td>category</td>
                                        <td>discription</td>
                                        <td class="text-center">action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                                    <tr class="data-row">
                                        <td class="id"><?php echo e($items->id); ?></td>
                                        <td class="title"><?php echo e($items->title); ?></td>
                                        <td class="description"><?php echo e($items->description); ?></td>
                                        <td class="text-center">
                                        <button type="button" class="btn btn-success" id="edit-item" data-item-id="<?php echo e($items->id); ?>">edit</button>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#delete-modal">
                                           <a href="<?php echo e(url('/category-delete/'.$items->id)); ?>">
                                                delete
                                           </a>
                                        </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Category modal  -->

                        <div class="form-popup" id="myForm">
                                <div class="modal-header" style="background-color: #fff;">
                                    <h5 class="modal-title" id="edit-modal-label">Add Category</h5>
                                    <button id="closemodal" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <form action="<?php echo e(url('/admin/category')); ?>" class="form-container" method="post">

                            <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
                                
                                <label for="email"><b>Title</b></label>
                                <input type="text" placeholder="Enter Title" name="title" required>

                                <label for="description"><b>Description</b></label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                                <br>
                                <button type="submit" class="btn">SAVE</button>
                                
                            </form>
                        </div>

                        <!-- Attachment Modal -->
                            <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="edit-modal-label">Edit Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="attachment-body-content">
                                    <form id="edit-form" class="form-horizontal" method="POST" action="<?php echo e(url('/admin/category-update')); ?>">
                                     <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
                                        <div class="card mb-0">
                                            <div class="card-body">
                                            <!-- name -->
                                            <input type="hidden" name="id" class="form-control" id="modal-input-id">
                                            <div class="form-group">
                                                <label class="col-form-label" for="modal-input-name">Title</label>
                                                <input type="text" name="title" class="form-control title" id="modal-input-name" required autofocus>
                                            </div>
                                            <!-- /name -->
                                            <!-- description -->
                                            <div class="form-group">
                                                <label class="col-form-label" for="modal-input-description">Description</label>
                                                <input type="text" name="description" class="form-control description" id="modal-input-description" required>
                                            </div>
                                            <!-- /description -->
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                                
                                </div>
                            </div>
                            </div>
                        <!-- /Attachment Modal -->


                    </div>


                    <div class="tab-pane" id="tabs-2" role="tabpanel">

                        <div class=" mt-1 mb-1 text-right">
                            <button class="btn btn-large btn-success" onclick="newsForm()">Add news</button>
                            </div>
                            <div class='col-md-12'>
                                <table class="table table-border">
                                    <thead>
                                        <tr>
                                            <td>sl</td>
                                            <td>title</td>
                                            <td>category</td>
                                            <td>discription</td>
                                            <td>author</td>
                                            <td>image</td>
                                            <td class="text-center">action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php $__currentLoopData = $newsitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $itemData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <tr class="data-row">
                                           <td class="id"><?php echo e($itemData->id); ?></td>
                                           <td class="title"><?php echo e($itemData->title); ?></td>
                                           <td class="category"><?php echo e($itemData->cate_title); ?></td>
                                           <td class="description"><?php echo e($itemData->description); ?></td>
                                           <td class="author"><?php echo e($itemData->author); ?></td>
                                           <td class="image"><?php echo e($itemData->image); ?></td>

                                           <td class="text-center">
                                                <button type="button" class="btn btn-success" id="edit-news" data-item-id="<?php echo e($itemData->id); ?>">edit</button>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#delete-modal">
                                                <a href="<?php echo e(url('/news-delete/'.$itemData->id)); ?>">
                                                        delete
                                                </a>
                                                </button>
                                        </td>
                                       </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


<!-- News modal  -->

                        <div class="form-popup" id="news-form">
                                <div class="modal-header" style="background-color: #fff;">
                                    <h5 class="modal-title" id="edit-modal-label">Add News</h5>
                                    
                                </div>
                            <form action="<?php echo e(url('/admin/newsadd')); ?>" class="form-container" method="post" enctype="multipart/form-data">

                            <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
                                
                                <label for="email"><b>Title</b></label>
                                <input type="text" placeholder="Enter Title" name="title" required>

                                <label for="category_id"><b>Category</b></label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">select one</option>
                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($items->id); ?>"><?php echo e($items->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <label for="description"><b>Description</b></label>
                                <textarea name="description" id="description" class="form-control"></textarea>

                                <label for="author"><b>Author</b></label>
                                <input type="text" placeholder="Enter Author" name="author" required>

                                <label for="email"><b>Image</b></label>
                                <input type="file" name="image" required>

                                <button type="submit" class="btn">SAVE</button>
                                
                            </form>
                        </div>

                        <!-- Attachment Modal -->
                        <div class="modal fade" id="edit-news-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="edit-modal-label">Edit Data</h5>
                                    
                                </div>
                                <div class="modal-body" id="attachment-body-content">
                                    <form id="edit-news-form" class="form-horizontal" method="POST" action="<?php echo e(url('/admin/news-update')); ?>" enctype="multipart/form-data">
                                     <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
                                        <div class="card mb-0">
                                            <div class="card-body">
                                            <input type="hidden" name="id" class="form-control" id="modal-news-id">
                                            
                                                <!-- name -->
                                                <div class="form-group">
                                                    <label class="col-form-label" for="modal-input-name">Title</label>
                                                    <input type="text" name="title" class="form-control title" id="modal-input-title">
                                                </div>
                                                <!-- /name -->
                                                <!-- category -->
                                                <div class="form-group">
                                                    <label class="col-form-label" for="modal-input-name">category</label>
                                                    <select name="category_id" id="category_id" class="form-control">
                                                        <option value="">select one</option>
                                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($items->id); ?>"><?php echo e($items->title); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <!-- <input type="text" name="category_id" class="form-control category" id="modal-input-category"> -->
                                                </div>
                                                <!-- /category -->
                                                <!-- description -->
                                                <div class="form-group">
                                                    <label class="col-form-label" for="modal-input-description">Description</label>
                                                    <input type="text" name="description" class="form-control description" id="modal-news-description">
                                                </div>
                                                <!-- /description -->
                                                <!-- author -->
                                                <div class="form-group">
                                                    <label class="col-form-label" for="modal-input-name">Author</label>
                                                    <input type="text" name="author" class="form-control author" id="modal-input-author">
                                                </div>
                                                <!-- /author -->
                                                    
                                                <!-- image -->
                                                <div class="form-group">
                                                    <label class="col-form-label" for="modal-input-name">Image</label>
                                                    <input type="file" name="image" class="form-control image">
                                                    <img id="edit_vst_photo" width="100px">
                                                </br>    

                                                </div>
                                                <!-- /image -->
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                                
                                </div>
                            </div>
                            </div>
                        <!-- /Attachment Modal -->


                    </div>





        </div>
    </div>
</div>
<script>
        function openForm() {
        document.getElementById("myForm").style.display = "block";
        }

       

        // function closeForm() {
            
        // document.getElementById("myForm").style.display = "none";
        // }


        $(document).ready(function() {

                $(".close").click(function(){
                $("#myForm").modal('hide');
                 });
            
            $(document).on('click', "#edit-item", function() {
                $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

                var options = {
                'backdrop': 'static'
                };
                $('#edit-modal').modal(options)

            })

            // on modal show
            $('#edit-modal').on('show.bs.modal', function() {
                var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
                var row = el.closest(".data-row");

                //console.log(el.closest(".data-row"));

                // get the data
                var id = el.data('item-id');
                var name = row.children(".title").text();
                var description = row.children(".description").text();

                

                // fill the data in the input fields
                $("#modal-input-id").val(id);
                $("#modal-input-name").val(name);
                $("#modal-input-description").val(description);


            })

            // on modal hide
            $('#edit-modal').on('hide.bs.modal', function() {
                $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
                $("#edit-form").trigger("reset");
            })
        })



        function newsForm() {
        document.getElementById("news-form").style.display = "block";
        }

        // function closenewsForm() {
        // document.getElementById("news-form").style.display = "none";
        // }


        $(document).ready(function() {
            
            $(document).on('click', "#edit-news", function() {
                $(this).addClass('edit-news-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
                
                var options = {
                'backdrop': 'static'
                };
                $('#edit-news-modal').modal(options)

                //alert('test');
            })

            // on modal show
            $('#edit-news-modal').on('show.bs.modal', function() {
                var el = $(".edit-news-trigger-clicked"); // See how its usefull right here? 
                var row = el.closest(".data-row");
                
                //console.log(row.children(".description").text());

                // get the data
                var id = el.data('item-id');
                var name = row.children(".title").text();
                var category_id = row.children(".category").text();
                var description = row.children(".description").text();
                var author = row.children(".author").text();
                var image = row.children(".image").text();
                            
                //alert(image);
                //console.log(image);

                // fill the data in the input fields
                $("#modal-news-id").val(id);
                $("#modal-input-title").val(name);
                $("#modal-input-category").val(category_id);
                $("#modal-news-description").val(description);
                $("#modal-input-author").val(author);
                //$("#modal-input-image").val(image);
                $('#edit_vst_photo').attr("src","<?php echo e(asset('image/')); ?>"+"/"+image);
                
            })

            // on modal hide
            $('#edit-news-modal').on('hide.bs.modal', function() {
                $('.edit-news-trigger-clicked').removeClass('edit-news-trigger-clicked')
                $("#edit-news-form").trigger("reset");
            })
        })

    </script>
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\server\htdocs\task\jugantar\resources\views/backend/home.blade.php ENDPATH**/ ?>