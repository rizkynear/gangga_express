@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="title-main">
            Add Blog
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li class="active">Add Blog</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">

                    <div class="box-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label class="required">Photo</label>
                                <div class="row row-custom">
                                    <div class="col-sm-2">
                                        <img class="img-responsive margin-bot-10" src="http://via.placeholder.com/158x181" alt="">
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                    <i class="fa fa-folder-open"></i>&nbsp;Browse <input type="file" name="image">
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" value="No file chosen" readonly="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <ul class="nav nav-tabs margin-top-30">
                                <li class="active"><a data-toggle="tab" href="#news-id"><img src="img/flag_id.jpg" alt=""> Indonesia</a></li>
                                <li><a data-toggle="tab" href="#news-en"><img src="img/flag_gb.png" alt=""> English</a></li>
                            </ul>
                            <div class="tab-content">
                                <!--INDONESIA-->
                                <div id="news-id" class="tab-pane fade in active">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="required">Title</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="required">Description</label>
                                            <textarea id="blog-text-id"></textarea>
                                            <script>
                                                ClassicEditor
                                                    .create(document.querySelector('#blog-text-id'), {
                                                        removePlugins: ['Table', 'MediaEmbed']
                                                    })
                                                    .catch(error => {
                                                        console.error(error);
                                                    });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <!--INDONESIA END-->
                                <!--ENGLISH-->
                                <div id="news-en" class="tab-pane fade">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea id="blog-text-en"></textarea>
                                            <script>
                                                ClassicEditor
                                                    .create(document.querySelector('#blog-text-en'), {
                                                        removePlugins: ['Table', 'MediaEmbed']
                                                    })
                                                    .catch(error => {
                                                        console.error(error);
                                                    });
                                            </script>
                                        </div>
                                    </div>

                                </div>
                                <!--ENGLISH END-->
                            </div>
                            <div class="box-body">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                <button type="button" class="btn btn-default">Cancel</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection