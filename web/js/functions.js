function setActiveTab (tabId) {
  aux = document.getElementById('menuItems');
  tabs = aux.getElementsByTagName('li');
  for(i=0;i<tabs.length;i++)
  {
    if (tabs[i].id != tabId) {
      tabs[i].removeClassName('menuItemSelected');
    }
    else
    {
      tabs[i].addClassName('menuItemSelected');
    }
  }
}

function checkAll(isGroup) {
  set = document.getElementsByName(isGroup.name);
  isState = isGroup.checked;
  for (i = 0; i < set.length; i++)
  {
    set[i].checked = isState;
  }
}

