<?php

$title_default = 'Page | Chocolaterie';
$title = 'Page | Produits';
$first_title = 'nos produits';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Components/header.php';

?>

<div class="row">
    <div class="col-2 color-product p-0"></div>
    <div class="col-10 p-0">
        <img class="img-fluid w-100" src="../../assets/images/produits/7DC22F4B-08A1-4656-8E69-9026556B.jpg" alt="Bannière produits">
    </div>
</div>
<div class="d-flex">
    <aside class="filter col-2 p-3">
        <h3 class="text-center my-3">Filtre</h3>
        <div class="container">
            <form action="" method="post">
                <h4 class="text-center text-decoration-underline my-3">Filter par type :</h4>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="filter_chocolat" id="filter_chocolat" value="chocolat">
                    <label class="form-check-label" for="vendu">Chocolats</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="filter_cafe" id="filter_cafe" value="cafe">
                    <label for="stock">Café</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="filter_the" id="filter_the" value="the">
                    <label for="vendu">Thé</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="filter_glace" id="filter_glace" value="glace">
                    <label for="stock">Glace</label>
                </div>
                <h4 class="text-center text-decoration-underline my-3">Type de chocolat:</h4>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="filter_chocolat" id="filter_chocolat" value="chocolat">
                    <label for="vendu">Chocolats noir</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="filter_cafe" id="filter_cafe" value="cafe">
                    <label for="stock">Chocolats au lait</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="filter_the" id="filter_the" value="the">
                    <label for="vendu">Chocolats praliné</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="filter_glace" id="filter_glace" value="glace">
                    <label for="stock">Chocolats alcoolisé</label>
                </div>
                <h4 class="text-center text-decoration-underline my-3">Café ou thé:</h4>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="filter_chocolat" id="filter_chocolat" value="chocolat">
                    <label for="vendu">Café grain</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="filter_cafe" id="filter_cafe" value="cafe">
                    <label for="stock">Café capucino</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="filter_the" id="filter_the" value="the">
                    <label for="vendu">Thé vert</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="filter_glace" id="filter_glace" value="glace">
                    <label for="stock">Thé noir</label>
                </div>
            </form>
        </div>
    </aside>
    <section class="col-10 p-0">
        <h2 class="titre-secondary text-uppercase text-center my-4">catalogue de nos produits</h2>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card-body">
                        <h3 class="titre-tertiary my-3">Bonbon chocolat noir</h3>
                        <img class="card-img-top rounded" src="/assets/images/produits/image-product.jpg" alt="image produit chocolat">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-product btn-product-small text-white my-3" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card-body">
                        <h3 class="titre-tertiary my-3">Bonbon chocolat au lait</h3>
                        <img class="card-img-top rounded" src="/assets/images/produits/image-product.jpg" alt="image produit chocolat">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-product btn-product-small text-white my-3" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card-body">
                        <h3 class="titre-tertiary my-3">Bonbon chocolat praliné</h3>
                        <img class="card-img-top rounded" src="/assets/images/produits/image-product.jpg" alt="image produit chocolat">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-product btn-product-small text-white my-3" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card-body">
                        <h3 class="titre-tertiary my-3">Café de colombie</h3>
                        <img class="card-img-top rounded" src="/assets/images/produits/810BC1B5-95C7-49E7-B402-B8A8757E5BC0.jpeg" alt="image produit chocolat">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-product btn-product-small text-white my-3" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card-body">
                        <h3 class="titre-tertiary my-3">Café de cuba</h3>
                        <img class="card-img-top rounded" src="/assets/images/produits/810BC1B5-95C7-49E7-B402-B8A8757E5BC0.jpeg" alt="image produit chocolat">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-product btn-product-small text-white my-3" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card-body">
                        <h3 class="titre-tertiary my-3">Tisane miel citron</h3>
                        <img class="card-img-top rounded" src="/assets/images/produits/DSCF6809.JPG" alt="image produit chocolat">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-product btn-product-small text-white my-3" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card-body">
                        <h3 class="titre-tertiary my-3">Glace chocolat</h3>
                        <img class="card-img-top rounded" src="/assets/images/produits/DSCF8358.jpg" alt="image produit chocolat">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-product btn-product-small text-white my-3" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card-body">
                        <h3 class="titre-tertiary my-3">Glace vanille</h3>
                        <img class="card-img-top rounded" src="/assets/images/produits/DSCF8358.jpg" alt="image produit chocolat">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-product btn-product-small text-white my-3" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card-body">
                        <h3 class="titre-tertiary my-3">Glace framboise</h3>
                        <img class="card-img-top rounded" src="/assets/images/produits/DSCF8358.jpg" alt="image produit chocolat">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-product btn-product-small text-white my-3" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</div>

<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Components/footer.php'; ?>