#ModX Glossary of Terms
--------------------------------------------------------------------

**Contents**

1. [Introduction](#introduction)
2. [The Snippet](#the-snippet-glossary)
3. [The Plugin](#the-plugin-to-come)

--------------------------------------------------------------------

### Introduction
This component adds a page in the ModX manager interface that allows you to create & maintain a list of 
explanations for key terms in your site. Entries into the glossary take the form of `term => explanation` 
where `term` is the phrase being described and `explanation` is the description of said term.

Included in the package is a snippet called Glossary which will output the glossary terms to a resource page. 
The snippet is fully templatable using chunks specified as optional parameters to the snippet call, and various 
features can be turned on or off in the same manner.

### The Snippet `[[Glossary]]` 
This snippet outputs a list of terms and explanations, ordered alphabetically and grouped by first letter. 
It also ouputs a navigation list of links at the top of the glossary list to allow a user to jump to a specific letter.

At present the available snippet parameters are:
* `showNav`        -   show the letter nav at the top of the list [default = true]
* `navOuterTpl`    -   chunk to use as the outer template for the letter nav
* `navItemTpl`     -   chunk to use for each item/link in the letter nav
* `listOuterTpl`   -   chunk to use as the outer template for the term list
* `listGroupTpl`   -   chunk to use for each letter group in the term list
* `listTermTpl`    -   chunk to use for each term in a letter group
          

### The Plugin `(to come)`
I also plan to include a plugin that will automatically search resource content for any of the terms in the
glossary and link them to the corresponding entry on the glossary page
              