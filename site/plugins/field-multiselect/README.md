![Multiselect Field for Kirby CMS](docs/assets/logo.png)  

[![Release](https://img.shields.io/github/release/distantnative/multiselect.svg)](https://github.com/distantnative/multiselect/releases)  [![Issues](https://img.shields.io/github/issues/distantnative/multiselect.svg)](https://github.com/distantnative/multiselect/issues) 
[![Moral License](https://img.shields.io/badge/buy-moral_license-8dae28.svg)](https://gumroad.com/l/kirby-multiselect)

The Multiselect field plugin introduces a select field type for the panel that allows you to choose multiple entries.

The plugin is free, but I would appreciate it if you would support me with a [moral license](https://gumroad.com/l/kirby-multiselect)!


## Requirements
Since version 1.0.0 the multiselect field requires Kirby CMS 2.3 or higher.  
If you are running an older version of Kirby, please use [version 1.4.0](https://github.com/distantnative/multiselect/releases/tag/v1.4) of the multiselect field.


# Installation & Update
Copy the files to `site/plugins/field-multiselect/`.


# Usage

Use it in your blueprint:

```
bestband:
  label: Best Band Ever
  type: multiselect
  required: true
  search: true
  options:
    1d : 1Direction
    bb: BBoys
    aq: Aqua
    vb: Vengaboys
    fr: Freiheit
    o3: OH!O
    mi: Miley
    bi: Bieber
    u2: U2
```

Result:

![multiselect](docs/assets/example.gif)  

It can also be used with the usual field options (pages etc.) of the [checkboxes field](https://getkirby.com/docs/cheatsheet/panel-fields/checkboxes).

## Version history
You can find a more or less complete version history in the [changelog](docs/CHANGELOG.md).

## License
[MIT License](http://www.opensource.org/licenses/mit-license.php)

## Author
Nico Hoffmann - <https://nhoffmann.com>
