#ModX Glossary of Terms
--------------------------------------------------------------------

**Contents**

* [Introduction](#introduction)
* [The Snippet](#the-snippet-glossary)
  * [Parameters](#snippet-parameters)
* [The Plugin](#the-plugin-glossaryhighlighter)
  * [Plugin Properties](#required-plugin-properties)
  * [Template Placeholders](#available-chunk-placeholders)

--------------------------------------------------------------------

## Introduction
This component adds a page in the ModX manager interface that allows you to create & maintain a list of 
explanations for key terms in your site. Entries into the glossary take the form of `term => explanation` 
where `term` is the phrase being described and `explanation` is the description of said term.

Included in the package is a snippet called Glossary which will output the glossary terms to a resource page. 
The snippet is fully templatable using chunks specified as optional parameters to the snippet call, and various 
features can be turned on or off in the same manner.

--------------------------------------------------------------------

## The Snippet `[[Glossary]]` 
This snippet outputs a list of terms and explanations, ordered alphabetically and grouped by first letter. 
It also ouputs a navigation list of links at the top of the glossary list to allow a user to jump to a specific letter.

#### Snippet Parameters
* `showNav`        -   show the letter nav at the top of the list [default = true]
* `navOuterTpl`    -   chunk to use as the outer template for the letter nav
* `navItemTpl`     -   chunk to use for each item/link in the letter nav
* `listOuterTpl`   -   chunk to use as the outer template for the term list
* `listGroupTpl`   -   chunk to use for each letter group in the term list
* `listTermTpl`    -   chunk to use for each term in a letter group
    
--------------------------------------------------------------------

## The Plugin `GlossaryHighlighter`
The Highlighter plugin parses page content fields on render and replaces all occurrences of terms with markup defined
in the plugin's tpl chunk. This can be used to provide a link directly to the glossary entry for that term.

#### Required plugin properties:
* `tpl`   -    the chunk to use for the replacement
* `resId` -    id of a resource displaying the [[Glossary]] snippet (for link generation)
          
#### Available chunk placeholders:
* `[[+link]]`  - link url including hash anchor
* `[[+term]]`  - the term being referenced
* `[[+explanation]]`   -  the explanation for this term