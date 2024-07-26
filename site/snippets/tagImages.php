<?php displayProjectImages($projects); ?>

<?php
function displayProjectImages($filteredProjects): void {

  $allProjectImagesWithUrl = [];
  foreach ($filteredProjects as $singleProject) {
    foreach ($singleProject->gallery()->toFiles() as $image) {
      $allProjectImagesWithUrl[] = (object)[
        'image'        => $image,
        'projectTitle' => $singleProject->title(),
        'projectUrl'   => $singleProject->url(),
      ];
    }
  }
  shuffle($allProjectImagesWithUrl);
  shuffle($allProjectImagesWithUrl);

  foreach ($allProjectImagesWithUrl as $baseimage): ?>
    <?php $image = $baseimage->image ?>
    <a
      href="<?= $baseimage->projectUrl ?>"
      class="pb-5 hover:text-cslightblue hover:brightness-105 w-full h-full grow-0"
    >

      <div class=" relative w-full" style="padding-bottom: <?= ($image->height() / $image->width()) * 100 ?>%;">
        <img
          class="absolute top-0 left-0 w-full h-full object-cover" alt="<?= $image->alt() ?>"
          data-src="<?= $image->thumb(['quality' => 30, 'format' => 'webp', 'height' => $image->height(), 'width' => $image->width()])->url() ?>"
          src="<?= $image->thumbhashUri() ?>"
          loading="lazy"
          data-custom-lazy
          width="<?= $image->width() ?>"
          height="<?= $image->height() ?>"
        />
      </div>

      <p class="font-mono text-xs w-full">
        <?= $baseimage->projectTitle ?>
      </p>
    </a>
  <?php endforeach;
}

?>