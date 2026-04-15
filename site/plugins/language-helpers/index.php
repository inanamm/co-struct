<?php

Kirby::plugin("SlothieStudio/language-helpers", []);

class SlothieHelpers
{
    public function format_tag_names($field): string
    {
        $tagNames = [];
        foreach ($field->split(',') as $key) {
            $tagNames[] = $this->get_tag_name($key);
        }
        return implode(', ', array_filter($tagNames));
    }

    public function project_data(?string $filter, string $language): array
    {
        $projects = site()->page('projects')->children()->listed();

        if ($filter) {
            $projects = $projects->filterBy('competencies', $filter, '*=');
        }

        $data = [];
        foreach ($projects as $project) {
            $thumbsData = [];
            foreach ($project->gallery()->toFiles() as $image) {
                if ($image->show_on_landing()->isNotEmpty() && $image->show_on_landing()->toBool() === false)
                    continue;
                $thumbsData[] = $image->thumb([
                    'quality' => 60,
                    'lazy'    => true,
                    'format'  => 'webp',
                ])->html();
            }

            $data[] = [
                'content' => $project->translation($language)->content(),
                'url'     => $project->url($language),
                'thumbs'  => $thumbsData,
            ];
        }

        return $data;
    }

    public function competency_options(): array
    {
        $lang = strtolower(kirby()->language()->code());
        $termField = $lang . '_term';

        return site()->find('language-helper')
            ->competencies()
            ->toStructure()
            ->toArray(function ($option) use ($termField) {
                return [
                    'key'  => $option->key()->value(),
                    'term' => $option->content()->get($termField)->value(),
                ];
            });
    }

    public function get_tag_name(string $key)
    {
        $lang = strtolower(kirby()->language()->code());

        $helper = site()->find('language-helper');

        $bigAssLookup = $helper->competencies()->toStructure()
            ->add($helper->material()->toStructure())
            ->add($helper->fields()->toStructure());

        $match = $bigAssLookup->findBy('key', $key);

        if ($match && $match->{$lang . '_term'}()->isNotEmpty()) {
            return $match->{$lang . '_term'}()->html();
        }

        return null;
    }
}

function slothieHelpers(): SlothieHelpers
{
    return new SlothieHelpers();
}
