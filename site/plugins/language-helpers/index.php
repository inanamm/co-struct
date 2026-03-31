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
