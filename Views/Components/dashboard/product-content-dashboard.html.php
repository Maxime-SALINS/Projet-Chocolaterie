<h2 class="text-uppercase text-center">gestion du contenue</h2>
<h3>Page Produits</h3>
<div class="container my-5">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pages</th>
                <th scope="col">Type</th>
                <th scope="col">Contenu</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($page_elements as $page_element) : ?>
                <tr>
                    <th scope="row"><?= $page_element['element_id'] ?></th>
                    <td><?= $page_element['page_name'] ?></td>
                    <td><?= $page_element['element_type'] ?></td>
                    <td>
                        <?php if($page_element['element_type'] === 'image'): ?>
                            <img class="img-fluid" src="<?= $page_element['content'] ?>" alt="image base de données">
                        <?php else:?>
                            <?= $page_element['content'] ?>
                        <?php endif;?>
                    </td>
                    <td>
                        <a class="btn btn-success" href="/dashboard/contenu/update?id=<?= $page_element['element_id']?>&element_type=<?= $page_element['element_type']?>">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>