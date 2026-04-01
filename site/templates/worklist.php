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

<body class="text-csblack flex flex-col h-screen no-scrollbar">
    <div class="header bg-gradient-to-b from-cswhite to-transparent pb-5 relative lg:sticky top-0 z-50">
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

    $activeFilters = array_filter(explode(',', get('filters') ?? ''));
    $activeStatuses = array_filter(explode(',', get('status') ?? ''));

    $filterUrl = function (array $filters, array $statuses) use ($page): string {
        $params = [];
        if (!empty($filters))
            $params[] = 'filters=' . implode(',', $filters);
        if (!empty($statuses))
            $params[] = 'status=' . implode(',', $statuses);
        return empty($params) ? $page->url() : $page->url() . '?' . implode('&', $params);
    };

    $projectsPage = $site->find('home');
    $projects = $projectsPage->children()->published();
    $statusOptions = $projects->pluck('project_Status', null, true);
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
                        <a href="<?= $href ?>" hx-get="<?= $href ?>" hx-target="#worklist-content"
                            hx-select="#worklist-content" hx-swap="outerHTML" hx-push-url="true"
                            class="py-1 px-2 border border-csblack font-mono text-sm rounded-sm <?= $isActive ? 'bg-cslightblue text-csblack border-cslightblue' : '' ?> hover:bg-cslightblue hover:text-csblack">
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
                        <a href="<?= $href ?>" hx-get="<?= $href ?>" hx-target="#worklist-content"
                            hx-select="#worklist-content" hx-swap="outerHTML" hx-push-url="true"
                            class="py-1 px-2 border border-csblack font-mono text-sm rounded-sm <?= $isActive ? 'bg-cslightblue text-csblack border-cslightblue' : '' ?> hover:bg-cslightblue hover:text-csblack">
                            <?= t($status) ?>
                        </a>
                    <?php endforeach ?>
                </div>
            </div>

            <!-- PROJEKTLISTE -->
            <div class="flex flex-col font-sans text-base pt-6 pb-4 lg:px-0">
                <div class="flex flex-col px-3">

                    <div class="font-mono text-xs grid gap-x-2 lg:grid-cols-24 lg:gap-2 pb-1">
                        <div class="lg:col-span-5">
                            <?= t("projecttitle") ?>
                            <p class="hidden lg:flex lg:flex-col"><?= t("year") ?></p>
                        </div>
                        <div class="lg:flex lg:flex-col lg:col-span-5">
                            <div class="flex flex-row">
                                <div class="hidden lg:flex"><?= t("project") ?>,&nbsp;</div>
                                <div class="flex"><?= t("location") ?> </div>
                            </div>
                            <div class="hidden lg:flex"><?= t("collaboration") ?></div>
                        </div>
                        <p class="lg:col-span-4"><?= t("competencies") ?></p>
                        <p class="hidden lg:flex lg:flex-col lg:col-span-4"><?= t("material") ?></p>
                        <p class="hidden lg:flex lg:flex-col lg:col-span-4"><?= t("field") ?></p>
                        <p class="hidden lg:flex lg:flex-col lg:col-span-2 lg:text-right "><?= t("status") ?></p>
                    </div>

                    <?php foreach ($filteredProjects as $project): ?>
                        <?php
                        $name = $project->title();
                        $title = $project->listTitle();
                        $url = $project->url();
                        $hasDetailpage = $project->toggle_detailpage()->toBool();
                        ?>

                        <a <?= $hasDetailpage ? 'href="' . $url . '"' : 'aria-disabled="true" tabindex="-1"' ?>
                            class="grid gap-x-2 lg:grid-cols-24 py-1 border-t border-csblack last:border-b lg:gap-2 group <?= $hasDetailpage ? 'hover:text-cslightblue' : 'pointer-events-none cursor-default' ?>">

                            <div class="lg:col-span-5 flex flex-col">
                                <div class="flex flex-row">
                                    <?php if ($hasDetailpage): ?>
                                        <p class="hidden lg:group-hover:block pr-1">↗</p>
                                    <?php endif ?>
                                    <?= $name->escape() ?>
                                </div>
                                <p class="hidden lg:flex font-mono text-sm"><?= $project->year()->escape() ?></p>
                            </div>

                            <div class="pt-1 lg:pt-0 lg:flex lg:col-span-5">
                                <!-- Mobile: location only -->
                                <span class="lg:hidden font-mono text-sm">
                                    <?= $project->location()->escape() ?>
                                </span>

                                <div class="lg:flex lg:flex-col">
                                    <!-- Desktop layout -->
                                    <span class="hidden lg:flex lg:flex-col">
                                        <?= $title->inline() . ', ' . $project->location()->escape() ?>
                                    </span>
                                    <!-- Collaboration (unchanged) -->
                                    <p class="hidden lg:flex font-mono text-sm">
                                        <?= $project->collaboration()->escape() ?>
                                    </p>
                                </div>
                            </div>


                            <div class="lg:col-span-4 font-mono text-sm">
                                <?= SlothieHelpers()->format_tag_names($project->competencies()->tags()) ?>
                            </div>

                            <div class="hidden lg:flex lg:col-span-4 font-mono text-sm">
                                <?= SlothieHelpers()->format_tag_names($project->material()->tags()) ?>
                            </div>

                            <div class="hidden lg:flex lg:col-span-4 font-mono text-sm">
                                <?= SlothieHelpers()->format_tag_names($project->fields()->tags()) ?>
                            </div>

                            <div class="hidden lg:flex lg:flex-col lg:col-span-2 text-right font-mono text-sm">
                                <div><?= t($project->project_Status()) ?></div>
                                <?php if ($project->project_Status() == 'competition'): ?>
                                    <div><?= $project->competition_Result()->escape() ?></div>
                                <?php endif ?>
                            </div>

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