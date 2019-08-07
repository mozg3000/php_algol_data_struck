<?php
    $dir = new DirectoryIterator('c:\\');

    function render($dir){


    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<!--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>-->
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row" style="margin-top: 5%">
        <div class="col-s-2" style="overflow: hidden">
            <ul id="dir_root">
                <?php foreach ($dir as $folder):?>
                    <li>
                        <?php if ($folder->isDir()):?>
                            <b>+</b>
                            <button class="btn btn-light" class="item" data-type="folder" data-path="<?php echo $folder->getPathname()?>">
                                <?php echo $folder->getFilename();?>
                            </button>
                            <?php print_r($_GET['folder']);?>
                            <?php print_r($folder->getPathname());?>
                            <?php echo (strpos(($_GET['folder']), $folder->getPathname()));?>

<!--                            --><?php //if($_GET && $_GET['folder'] === $folder->getPathname()):?>
                            <?php if(strpos(($_GET['folder']), $folder->getPathname()) !== false):?>
                                <?php
                                    $subdirs = explode('\\', substr($_GET['folder'], 3));

                                var_dump('subdirs',$subdirs);
                                var_dump(count($subdirs));
                                ?>
                                <?php for ($i=0, $disk='c:\\'; $i<count($subdirs);++$i):?>
                                    <?php
                                    //print_r($disk);
                                    var_dump('disk', $disk);
                                    $disk = $disk  . $subdirs[$i];
                                    var_dump('disk', $disk);
                                        $path = new DirectoryIterator($disk);
                                    ?>

                                    <ul>
                                        <?php foreach ($path as $subfolder):?>
                                            <li>
                                                <?php if ($subfolder->isDir()):?>
                                                    <b>+</b>
                                                    <button data-type="folder" data-path="<?php echo $subfolder->getPathname()?>">
                                                        <?php echo $subfolder->getFilename();?>
                                                    </button>
                                                    <?php print_r($subfolder->getPathname());?>
                                                <?php else:?>
                                                    <button>
                                                        <?php echo $subfolder->getFilename();?>
                                                    </button>
                                                <?php endif;?>
                                            </li>
                                        <?php endforeach;?>
                                    </ul>
                                <?php endfor;?>
                            <?endif;?>
                        <?php else:?>
                            <button class="btn btn-light" class="item">
                                <?php echo $folder->getFilename();?>
                            </button>
                        <?php endif;?>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
        <div class="col-s-4" id="content">

                <?php if($_GET):?>

                    <?php $subdir = new DirectoryIterator($_GET['folder']);?>

                    <?php foreach ($subdir as $folder):?>

                            <?php if ($folder->isDir()):?>
                                <b>+</b>
                                <a data-type="folder" href="#">
                                    <?php echo $folder->getFilename();?>
                                </a>
                            <?php else:?>
                                <a href="#">
                                    <?php echo $folder->getFilename();?>
                                </a>
                            <?php endif;?>

                    <?php endforeach;?>
                <?endif;?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(e){

        $('#dir_root').bind("click",function(e){

           if(e.target.dataset.type === 'folder'){

               window.location.replace("http://algol?folder="+(e.target.dataset.path).trim());
<!--               --><?php
//               $dir = new DirectoryIterator('c:\\');
//               ?>


<!--                        --><?php //foreach ($dir as $folder):?>
//                            html = `
//
//                                    <?php //if ($folder->isDir()):?>
//                                        <b>+</b>
//                                        <a href="#" data-type="folder">
//                                            <?php //echo $folder->getFilename();?>
//                                        </a>
//                                    <?php //else:?>
//                                        <a href="#">
//                                            <?php //echo $folder->getFilename();?>
//                                        </a>
//                                    <?php //endif;?>
//                                `;
//                            $html = $(html);
//                            $('#content').append($html);
//                        <?php //endforeach;?>



           };
        })
        // console.log(e.target());
    });
</script>
</body>
</html>
