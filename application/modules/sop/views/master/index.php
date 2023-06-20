<div class="col-lg-3">
    <aside class="doc_left_sidebarlist">
        <div class="scroll">
            <ul class="list-unstyled nav-sidebar">
                <li class="nav-item">
                    <a href="doc-main.html" class="nav-link"><img src="<?php echo base_url(); ?>themes/docy/img/side-nav/home.png" alt="">Home</a>
                </li>
                <li class="nav-item active">
                    <a href="doc-main.html" class="nav-link"><img src="<?php echo base_url(); ?>themes/docy/img/side-nav/briefcase.png" alt="briefcase">Elements</a>
                    <span class="icon"><i class="arrow_carrot-down"></i></span>
                    <ul class="list-unstyled dropdown_nav">
                        <li><a href="doc-element-tab.html">Tabs</a></li>
                        <li><a href="doc-element-accordion.html">Accordion</a></li>
                        <li><a href="doc-element-notice.html">Notices</a></li>
                        <li><a href="doc-content-tables.html">Table</a></li>
                        <li><a href="doc-element-lightbox.html">Image Lightbox</a></li>
                        <li><a class="active" href="doc-element-hotspots.html">Image Hotspots</a></li>
                        <li><a href="doc-element-code.html">Source Code</a></li>
                        <li><a href="doc-content-tooltip.html">Tooltip</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="doc-ref-cheatsheet.html" class="nav-link"><img src="<?php echo base_url(); ?>themes/docy/img/side-nav/chat1.png" alt="">Reference</a>
                    <span class="icon"><i class="arrow_carrot-down"></i></span>
                    <ul class="list-unstyled dropdown_nav">
                        <li><a href="doc-ref-cheatsheet.html">Cheatsheet</a></li>
                        <li><a href="doc-ref-footnote.html">Footnotes</a></li>
                        <li><a href="doc-tour.html">Interface Tour</a></li>
                        <li><a href="doc-ref-can-use.html">Can I Use</a></li>
                        <li><a href="doc-content-tooltip.html">Tooltips & Direction</a></li>
                        <li><a href="doc-ref-shortcuts.html">Keyboard Shortcuts</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="typography.html" class="nav-link"><img src="<?php echo base_url(); ?>themes/docy/img/side-nav/document.png" alt="">Content</a>
                    <span class="icon"><i class="arrow_carrot-down"></i></span>
                    <ul class="list-unstyled dropdown_nav">
                        <li><a href="doc-content-image.html">Image</a></li>
                        <li><a href="doc-element-tab.html">Tables</a></li>
                        <li><a href="doc-element-code.html">Code</a></li>
                        <li><a href="doc-content-video.html">Video</a></li>
                        <li><a href="doc-content-tooltip.html">Tooltips & Direction</a></li>
                        <li><a href="typography.html">Typography</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="doc-content-video.html" class="nav-link"><img src="<?php echo base_url(); ?>themes/docy/img/side-nav/layout.png" alt="">Layouts</a>
                    <span class="icon"><i class="arrow_carrot-down"></i></span>
                    <ul class="list-unstyled dropdown_nav">
                        <li><a href="doc-content-video.html">Full-width</a></li>
                        <li><a href="doc-element-hotspots.html">Left Sidebar</a></li>
                        <li><a href="doc-layout-banner-gradient.html">Gradient Banner</a></li>
                        <li><a href="doc-layout-banner-empty.html">Without Banner</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="doc-changelog.html" class="nav-link"><img src="<?php echo base_url(); ?>themes/docy/img/side-nav/clock.png" alt="">Change Log</a>
                </li>
            </ul>
            <ul class="list-unstyled nav-sidebar coding_nav">
                <li class="nav-item">
                    <a href="#" class="nav-link"><img src="<?php echo base_url(); ?>themes/docy/img/side-nav/account.png" alt="">Account</a>
                </li>
                <li class="nav-item">
                    <a href="doc-element-code.html" class="nav-link"><img src="<?php echo base_url(); ?>themes/docy/img/side-nav/coding.png" alt="">Development</a>
                </li>
            </ul>
        </div>
    </aside>
</div>
<div class="col-xl-9 doc-middle-content">
    <article class="shortcode_info">
        <div class="shortcode_title">
            <h1><?=$toolbar_title?></h1>
            <p><span>Welcome to Docy !</span> Get familiar with the Docyproducts and explore
                their features:</p>
        </div>
        <section class="content container-fluid">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-file"></i>
                    <h3 class="box-title"> <?= $toolbar_title ?></h3>
                    <div class="pull-right">
                        <a onclick="add()" class="btn btn-sm btn-success pull-right" style="margin:3px;width: 100%;">
                            <i class="fa fa-plus"></i> New Data
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="tableData" class="table table-striped no-footer nowrap" role="grid" width="100%">
                                    <thead>
                                        <tr role="row">
                                            <th width="50">No</th>
                                            <th>Position</th>
                                            <th>Document No</th>
                                            <th>Document Date</th>
                                            <th>Revision</th>
                                            <th>Title</th>
                                            <th width="100">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($sopLists as $sopList){
                                            $detail = "detail('".$sopList->document_no."')";
                                            echo '<tr>
                                                    <td>'.$no.'</td>
                                                    <td>'.$sopList->position_name.'</td>
                                                    <td>'.$sopList->document_no.'</td>
                                                    <td>'. tanggal($sopList->trans_date).'</td>
                                                    <td>'.$sopList->revision.'</td>
                                                    <td>'.$sopList->title.'</td>
                                                    <td>
                                                        <a onclick="'.$detail.'" class="btn btn-info btn-sm"><i class="fa fa-list"></i></a>
                                                        <a onclick="edit('.$sopList->id.')" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                        <a onclick="deleted('.$sopList->id.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                  </tr>';
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    

        

        
        
        
    </article>
</div>