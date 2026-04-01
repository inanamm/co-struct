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

<body class="text-csblack flex flex-col h-screen">
    <div class="header pb-5">
        <?php snippet('header', slots: true) ?>
        <?php slot('dash') ?>
        <div id="dash" class="w-7 bg-csblack h-[0.26rem] lg:h-[0.40rem] mt-[0.30rem] lg:mt-[0.44rem] self-center"
            alt="logo"></div>
        <?php endslot() ?>
        <?php slot('struct') ?>
        <?= url('struct-csblack.svg') ?>
        <?php endslot() ?>
        <?php slot('co') ?>
        <?= url('co-csblack.svg') ?>
        <?php endslot() ?>

        <?php endsnippet() ?>
    </div>

    <?php
    $competencyOptions = SlothieHelpers()->competency_options();
    $statusOptions     = ['in_planning', 'executed', 'competition'];

    $activeFilters  = array_filter(explode(',', get('filters') ?? ''));
    $activeStatuses = array_filter(explode(',', get('status') ?? ''));

    $filterUrl = function (array $filters, array $statuses) use ($page): string {
        $params = [];
        if (!empty($filters))  $params[] = 'filters=' . implode(',', $filters);
        if (!empty($statuses)) $params[] = 'status='  . implode(',', $statuses);
        return empty($params) ? $page->url() : $page->url() . '?' . implode('&', $params);
    };

    $projectsPage = $site->find('home');
    $projects = $projectsPage->children()->published();
    $filteredProjects = $projects->sortBy('year', 'asc');

    if (!empty($activeFilters)) {
        $filteredProjects = $filteredProjects->filter(function ($project) use ($activeFilters) {
            return count(array_intersect($activeFilters, $project->competencies()->split(','))) > 0;
        });
    }

    if (!empty($activeStatuses)) {
        $filteredProjects = $filteredProjects->filter(function ($project) use ($activeStatuses) {
            return in_array($project->project_Status()->value(), $activeStatuses);
        });
    }
    ?>

    <main id="third" class="flex flex-col gap-4 font-mono text-sm pt-2 pb-6 lg:text-sm">
        <h1 class="sr-only">
            <?= $page->title() ?>
        </h1>

        <h2 class="px-3 font-sans text-lg">
            <?= t("projects") ?>
        </h2>

        <div id="worklist-content">

            <div>
                <h3 class="px-3 font-mono text-sm pb-2">
                    <?= t("filter") ?>
                </h3>
                <div class="px-3 flex flex-row flex-wrap gap-1">
                    <?php foreach ($competencyOptions as $option):
                        $key = $option['key'];
                        $term = $option['term'];
                        $isActive = in_array($key, $activeFilters);
                        $newFilters = $isActive
                            ? array_values(array_diff($activeFilters, [$key]))
                            : array_merge($activeFilters, [$key]);
                        $href = $filterUrl($newFilters, $activeStatuses);
                    ?>
                        <a href="<?= $href ?>"
                            hx-get="<?= $href ?>"
                            hx-target="#worklist-content"
                            hx-select="#worklist-content"
                            hx-swap="outerHTML"
                            hx-push-url="true"
                            class="py-1 px-2 border border-csblack font-mono text-sm rounded-sm <?= $isActive ? 'bg-csblack text-cswhite' : '' ?>">
                            <?= $term ?>
                        </a>
                    <?php endforeach ?>

                    <?php foreach ($statusOptions as $status):
                        $isActive = in_array($status, $activeStatuses);
                        $newStatuses = $isActive
                            ? array_values(array_diff($activeStatuses, [$status]))
                            : array_merge($activeStatuses, [$status]);
                        $href = $filterUrl($activeFilters, $newStatuses);
                    ?>
                        <a href="<?= $href ?>"
                            hx-get="<?= $href ?>"
                            hx-target="#worklist-content"
                            hx-select="#worklist-content"
                            hx-swap="outerHTML"
                            hx-push-url="true"
                            class="py-1 px-2 border border-csblack font-mono text-sm rounded-sm <?= $isActive ? 'bg-csblack text-cswhite' : '' ?>">
                            <?= t($status) ?>
                        </a>
                    <?php endforeach ?>
                </div>
            </div>

            <!-- PROJEKTLISTE -->
            <div class="flex flex-col font-sans text-base pt-6 pb-4 lg:px-0">
                <div class="flex flex-col px-3">

                    <div class="font-mono text-xs grid gap-x-2 grid-cols-2 lg:grid-cols-12 lg:gap-1 pb-1">
                        <p class="lg:col-span-2"><?= t("projecttitle") ?></p>
                        <p class="lg:col-span-2"><?= t("project") ?></p>
                        <p class="lg:col-span-1"><?= t("location") ?></p>
                        <p class="lg:col-span-1"><?= t("status") ?></p>
                        <p class="lg:col-span-1"><?= t("collaboration") ?></p>
                        <p class="lg:col-span-1"><?= t("competencies") ?></p>
                        <p class="lg:col-span-1"><?= t("material") ?></p>
                        <p class="lg:col-span-1"><?= t("field") ?></p>
                        <p class="lg:col-span-1"><?= t("competition_Result") ?></p>
                        <p class="lg:col-span-1 lg:text-right"><?= t("year") ?></p>
                    </div>

                    <?php foreach ($filteredProjects as $project): ?>
                        <?php
                        $name = $project->title();
                        $title = $project->listTitle();
                        $url = $project->url();
                        $hasDetailpage = $project->toggle_detailpage()->toBool();
                        ?>

                        <a <?= $hasDetailpage ? 'href="' . $url . '"' : 'aria-disabled="true" tabindex="-1"' ?>
                            class="grid grid-cols-2 gap-x-2 lg:grid-cols-12 py-1 border-t border-csblack last:border-b lg:gap-1 group <?= $hasDetailpage ? 'hover:text-cslightblue' : 'pointer-events-none cursor-default' ?>">

                            <div class="lg:col-span-2 flex flex-row">
                                <?php if ($hasDetailpage): ?>
                                    <p class="hidden lg:group-hover:block pr-1">↗</p>
                                <?php endif ?>
                                <?= $name->escape() ?>
                            </div>

                            <div class="lg:col-span-2"><?= $title ?></div>

                            <div class="lg:col-span-1"><?= $project->location()->escape() ?></div>

                            <div class="lg:col-span-1"><?= t($project->project_Status()) ?></div>

                            <div class="lg:col-span-1"><?= $project->collaboration()->escape() ?></div>

                            <div class="lg:col-span-1">
                                <?= SlothieHelpers()->format_tag_names($project->competencies()->tags()) ?>
                            </div>

                            <div class="lg:col-span-1">
                                <?= SlothieHelpers()->format_tag_names($project->fields()->tags()) ?>
                            </div>

                            <div class="lg:col-span-1">
                                <?= SlothieHelpers()->format_tag_names($project->material()->tags()) ?>
                            </div>

                            <div class="lg:col-span-1">
                                <?php if ($project->project_Status() == 'competition'): ?>
                                    <?= $project->competition_Result()->escape() ?>
                                <?php endif ?>
                            </div>

                            <div class="lg:col-span-1 text-right"><?= $project->year()->escape() ?></div>

                        </a>
                    <?php endforeach ?>
                </div>
            </div>

        </div>
      <!-- #worklist-content -->

    </main>

    <div class="flex border-t border-csblack mt-auto">
        <?php snippet('footer') ?>
    </div>
    <?php snippet('seo/schemas'); ?>
    <?= vite()->js('index.js') ?>
</body>

</html>
