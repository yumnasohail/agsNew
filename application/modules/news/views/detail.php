<div class="page-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">Nyheter detaljer</div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">

                        <table class="table table-bordered table-striped">
                            <tr>
                                <th style="width:200px;">Tittel</th>
                                <td><?php echo $post['title']; ?></td>
                            </tr>
                            <tr>
                                <th>Dato</th>
                                <td><?php echo date("d M, Y", strtotime($post['date'])); ?></td>
                            </tr>
                            <tr>
                                <th>Forfatter
                                </th>
                                <td><?php echo $post['author']; ?></td>
                            </tr>
                            <tr>
                                <th>Kort beskrivelse
                                </th>
                                <td><?php echo $post['short_desc']; ?></td>
                            </tr>
                            <tr>
                                <th>Bilde
                                </th>
                                <td>
                                    <?php if(!empty($post['image'])): ?>
                                        <img src="<?php echo UPLOAD_FRONT_NEWS.$post['image']; ?>" 
                                             alt="News Image" 
                                             style="max-width:250px; height:auto;">
                                    <?php else: ?>
                                        <span class="text-muted">Ingen bilder lastet opp
                                        </span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>
