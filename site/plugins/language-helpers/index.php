<?php 

function get_tag_name(String $key) {
    $lang = strtolower(kirby()->language()->code());

    $helper = site()->find('language-helper');

    $bigAssLookup = $helper->competencies()->toStructure()
        ->extend($helper->material()->toStructure())
        ->extend($helper->fields()->toStructure());

    $match = $bigAssLookup->findBy('key', $key);

    if ($match && $match->{$lang . '_term'}()->isNotEmpty()) {
        return $match->{$lang . '_term'}()->html();
    }

    return null;
}