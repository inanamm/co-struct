<?php
/**
 * @var Kirby\Cms\App $kirby
 * @var Kirby\Cms\Site $site
 * @var Kirby\Cms\Page $page
 */
?>

  <!DOCTYPE html>
  <html class="bg-cswhite h-screen" lang="de">

  <?php snippet('head') ?>

  <body class="h-screen w-full">

  <main class="text-csblack h-screen flex flex-col lg:flex-row">
    <div class="flex flex-col lg:w-1/2 h-screen overflow-auto no-scrollbar">
      <div class="header bg-cswhite pb-5">
        <?php snippet('header', slots: true) ?>
        <?php slot('dash') ?>
        <div
          id="dash"
          class="w-7 bg-csblack h-[0.26rem] lg:h-[0.40rem] mt-[0.30rem] lg:mt-[0.44rem] self-center"
          alt="logo">
        </div>
        <?php endslot() ?>
        <?php slot('struct') ?>
        <?= url('struct-csblack.svg') ?>
        <?php endslot() ?>
        <?php slot('co') ?>
        <?= url('co-csblack.svg') ?>
        <?php endslot() ?>
        <?php endsnippet() ?>
      </div>
      <div class="sr-only">
        <h1>co–struct AG</h1>
      </div>
      <div id="second"
           class="flex flex-col gap-4 font-sans text-base px-3 pt-2 pb-5 h-full lg:pr-5 lg:justify-end lg:text-lg">
        <?= $site->intro()->kt() ?>
      </div>
      <div class="sr-only">
        <h2>Menu</h2>
      </div>

      <nav id="second"
           class="hidden lg:flex justify-between pt-2 pb-5 px-3 font-sans text-lg border-t border-csblack">

        <?php
        $items = $pages->listed();
        if ($items->isNotEmpty()): ?>
          <ul>
            <?php foreach ($items as $item): ?>
              <?php if (!($item->id() === "jobs" && $pages->get('jobs')->children()->listed()->count() < 1)): ?>
                <li <?= e($item->id() === 'news', 'class="mt-4 hover:text-cslightblue"') ?>>
                  <a <?= e($item->isOpen(), 'class="font-sansbold mt-2 hover:text-cslightblue"') ?>
                    href="<?= $item->url() ?>" class="hover:text-cslightblue">
                    <?= $item->title()->html() ?>
                  </a>
                  <?php if ($item->id() === 'home'): ?>
                    <nav>
                      <?php
                      $filter = param("filter");
                      $languageCode = $kirby->language()->code();
                      $projectPage = $pages->get('projects');
                      $tags = ['education', 'artInstallation', 'infrastructure', 'housing', 'research', 'serviceAndIndustry', 'sportAndCulture'];
                      foreach ($tags as $tag):
                        if ($projectPage->children()->filterBy('tag', $tag)->isNotEmpty()): ?>
                          <li class="hover:text-cslightblue <?= e($filter === $tag, 'pl-3 text-cslightblue') ?>">
                            <button class="filter-btn" data-filter="<?= $tag ?>">
                              <?= t($tag) ?>
                            </button>
                          </li>
                        <?php endif;
                      endforeach; ?>
                    </nav>
                  <?php endif; ?>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </nav>

      <div id="second"
           class="grid grid-cols-2 px-3 pt-3 pb-5 gap-1 w-full border-y border-csblack lg:hidden project-container">
        <?php displayProjectImages($pages); ?>
      </div>

      <div id="first" class="flex text-csblack lg:border-t border-csblack">
        <?php snippet('footer') ?>
      </div>
    </div>

    <div id="third"
         class="hidden divide-y divide-csgreen lg:grid flex-col lg:flex-wrap lg:w-1/2 lg:divide-none overflow-y-auto h-full no-scrollbar">
      <div class=" flex flex-col">
        <div class="grid grid-cols-4 pb-6 gap-1 w-full project-container">
          <?php displayProjectImages($pages); ?>
        </div>
      </div>

    </div>
  </main>
  <?php snippet('seo/schemas'); ?>
  <?= vite()->js('index.js') ?>
  <?= vite()->js('homepageImages.js') ?>
  </body>

  </html>

<?php
function displayProjectImages($pages): void {
  $projects = $pages->get('projects')->children();
  $filteredProjects = param("filter") ? $projects->filterBy('tag', param("filter")) : $projects;

  $allProjectImagesWithUrl = [];
  foreach ($filteredProjects as $singleProject) {
    foreach ($singleProject->gallery()->toFiles() as $image) {
      $allProjectImagesWithUrl[] = (object)[
        'imageX' => $image,
        'imageUrl' => $image->url(),
        'imageAlt' => $image->alt(),
        'projectTitle' => $singleProject->title(),
        'projectUrl' => $singleProject->url()
      ];
    }
  }
  // shuffle($allProjectImagesWithUrl);

  foreach ($allProjectImagesWithUrl as $image): ?>
    <a href="<?= $image->projectUrl ?>" class="pb-5 hover:text-cslightblue hover:brightness-105 w-full h-full">
      <?php echo $image->imageX->thumb([
        'quality' => 30,
        'lazy' => true,
        'format' => 'webp',
      ])->html(); ?>
      <p class="font-mono text-xs w-full">
        <?= $image->projectTitle ?>
      </p>
    </a>
  <?php endforeach;
}

?>