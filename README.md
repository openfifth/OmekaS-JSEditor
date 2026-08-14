# JS Editor

JS Editor is a module for Omeka S that allows you to provide custom JavaScript overriding scripts. You can also include URLs for external JS, like those used for analytics. JS Editor is used on a site-by-site basis.

The first large text area is where you write your individual scripts. Use that text area as you would a script file. This will load a line in every public page of your chosen Omeka S site, in the head, that looks like this:

`<script src="/yoursiteslug/js-editor"></script>`

This line will appear after the scripts that come from Omeka's defaults and from your chosen theme. So, entries here should override other scripts set in those files, unless there is a race condition. There may be other custom JS loading in the header below this line, particularly from theme libraries such as JQuery plug-ins.

JS Editor also allows you to include external scripts by entering their URLs. There is no limit to the number of external script URLs you can enter. Each text input can take a single URL, and additional inputs can be created by clicking the "Add another script" button.

See the [Omeka S user manual](http://omeka.org/s/docs/user-manual/modules/jseditor/) for user documentation.

# Copyright

JS Editor is Copyright © 2019-present Corporation for Digital Scholarship, Vienna, Virginia, USA http://digitalscholar.org and Copyright © 2026-present Open Fifth Ltd, Dorset, UK https://www.openfifth.co.uk

The Corporation for Digital Scholarship distributes the Omeka source code
under the GNU General Public License, version 3 (GPLv3). The full text
of this license is given in the license file.

The Omeka name is a registered trademark of the Corporation for Digital Scholarship.

Third-party copyright in this distribution is noted where applicable.

All rights not expressly granted are reserved.
