<?php

use Kirby\Cms\Page;
use Kirby\Data\Yaml;
use Kirby\Toolkit\Str;

class LanguageHelperPage extends Page
{
    public function update(
        array|null $input = null,
        string|null $languageCode = null,
        bool $validate = false
    ): static {
        $input = $input ?? [];
        $structuresToUpdate = ['competencies', 'fields', 'material'];

        foreach ($structuresToUpdate as $structureName) {
            if (empty($input[$structureName])) {
                // Skip if the structure is not present in the input
                continue;
            }

            $items = is_string($input[$structureName])
                ? Yaml::decode($input[$structureName])
                : $input[$structureName];

            $changed = false;

            foreach ($items as &$item) {
                if (empty($item['key'])) {
                    $item['key'] = Str::uuid();
                    $changed = true;
                }
            }
            unset($item);

            if ($changed) {
                $input[$structureName] = is_string($input[$structureName])
                    ? Yaml::encode($items)
                    : $items;
            }
        }

        return parent::update($input, $languageCode, $validate);
    }
}
