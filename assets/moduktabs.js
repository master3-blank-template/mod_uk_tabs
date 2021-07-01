/**
 * @package     Joomla.Plugin
 * @subpackage  Content.uk3tabs
 * @copyright   Copyright (C) Aleksey A. Morozov. All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

document.addEventListener('DOMContentLoaded', function () {

  function modUkTabs_showTab()
  {
    let anchor = window.location.hash.replace('#', '');
    let tab = document.getElementById(anchor);
    if (tab && tab.parentElement.classList.contains('mod_uk_tabs') == true) {
      if (tab.classList.contains('uk-open')) {
        return;
      }
      const index = (Array.prototype.slice.call(tab.parentElement.childNodes).indexOf(tab) + 1) / 2 - 1;
      UIkit.tab(tab.parentElement).show(index);
    }
  }

  document.body.onclick = function(event) {
    setTimeout(() => {
      let anchor = window.location.hash.replace('#', '');
      let tab = document.getElementById(anchor);
      if (tab && tab.parentElement.classList.contains('mod_uk_tabs')) {
        if (event.target.parentElement.parentElement == tab.parentElement) {
          return;
        }
        event.preventDefault();
        const index = (Array.prototype.slice.call(tab.parentElement.childNodes).indexOf(tab) + 1) / 2 - 1;
        UIkit.tab(tab.parentElement).show(index);
      }
    }, 100);
  };

  window.addEventListener('hashchange', function() {
    setTimeout(() => {
      modUkTabs_showTab();
    }, 100);
  })

  modUkTabs_showTab();

});
