<?php ?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="15%">Nama</th>
            <th width="15%">Email</th>
            <th width="15%">No Telephone</th>
            <th width="30%">Ulasan</th>
            <th width="40%">Balasan</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($ulasan as $ulasanItem) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $ulasanItem['nama'] ?></td>
                <td><?= $ulasanItem['email'] ?></td>
                <td><?= $ulasanItem['nomor_telepon'] ?></td>
                <td><?= $ulasanItem['message'] ?></td>
                <td class="d-flex justify-content-center">
                    <?php if (!empty($ulasanItem['balasan'])) : ?>
                        <?= $ulasanItem['balasan'] ?>
                    <?php else : ?>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#replyModal<?= $ulasanItem['id_pesan'] ?>">Reply</button>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= base_url('admin/ulasan/delete/' . $ulasanItem['id_pesan']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
                </td>
            </tr>

            <!-- Modal for replying to the review -->
            <div class="modal fade" id="replyModal<?= $ulasanItem['id_pesan'] ?>" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="replyModalLabel">Balas Pesan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="<?= base_url('admin/ulasan/replyform') ?>">
                                <div class="form-group">
                                    <label for="replyText<?= $ulasanItem['id_pesan'] ?>">Your Reply:</label>
                                    <textarea class="form-control" name="reply_text" id="replyText<?= $ulasanItem['id_pesan'] ?>" rows="3"></textarea>
                                </div>
                                <input type="hidden" name="modal_id" value="<?= $ulasanItem['id_pesan'] ?>">
                                <button type="submit" class="btn btn-primary">Submit Reply</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>





    </tbody>
</table>