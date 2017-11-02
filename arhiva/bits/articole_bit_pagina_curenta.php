<?php
/**
 * Toate informatiile necesare afisarii unei pagini de revista
 * si a barei de navigatie prin articol / revista
 */

// TODO handle errors if wrong ids

/* ------- navigatie articole ------- */

$thumbsArticolCurent = "";
if (!empty($_GET['articol'])) {
    $articolCurent = $_GET['articol'];
    $articolCurent = $editiaCurenta->listaArticole[$articolCurent];
    $thumbsArticolCurent = $articolCurent->buildHtmlPagesThumbnails();

    // TODO
    $navLinkPagePrev;
    $navLinkPageNext;
    $navLinkArticolPrev;
    $navLinkArticolNext;

    /* ------- afisare epagina curenta ------- */
    $paginaCurentaNr = "1";
    if (!empty($_GET['pagina']))  $paginaCurentaNr = $_GET['pagina'];
    $paginaCurentaHugeThumb = $editiaCurenta->listaPagini[$paginaCurentaNr]->getHugeThumbWithLinkToFullImage();

} else {
    /* ------- afisare thumbs toate paginile------- */
    $paginiThumbsContent = "";
    for ($pg = 1; $pg <= $editiaCurenta->maxNumPages; $pg++) {
        $paginiThumbsContent .= $editiaCurenta->listaPagini[$pg]->getThumbWithLinkToFullImage()."  ";
    }
}


