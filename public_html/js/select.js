( function( window, document ) {
  const S_PREFIX = 'select';
  const S_LOCALES = { en: { SEARCH: 'Search...', NO_RESULT: '- no result -', 
   PLACEHOLDER_SINGLE: '- Select -', PLACEHOLDER_MULTI: '- Select one or more -' } };
  const S_FONTSIZE = parseInt(window.getComputedStyle(document.body, null).getPropertyValue('font-size'));
  class Select {
    constructor(old) { this.getConfig(old); }
    getConfig(old) {
      this.dom = { old };
      this.type = 'Select_Controller';
      this.name = this.name || old.name || (+new Date()).toString();
      this.value = old.dataset.value || '';
      this.hasSearch = old.dataset.search;
      this.multiple = old.dataset.multiple;
      this.placeholder = old.dataset.placeholder;
      if (!this.placeholder) this.placeholder = this.multiple ? this.locale.PLACEHOLDER_MULTI : this.locale.PLACEHOLDER_SINGLE;
      this.locale = S_LOCALES[old.dataset.locale];
      this.id = `${S_PREFIX}-${this.name}`;
      this.disabled = old.disabled;
      this.isOpen = false;
    }
    focusOption(curr) {
      this.curr = curr;
      this.printOptions(this.shown);
      const which = this.dom.list.querySelector(`#${this.id}--${curr.key}`);
      if (this.hasSearch) this.dom.search.setAttribute('aria-activedescendant', which.id);
      this.dom.display.setAttribute('aria-activedescendant', which.id);
      const scrollTop = which.offsetTop - this.rem2px(5);
      this.dom.list.scrollTop = scrollTop < 0 ? 0 : scrollTop;
    }
    open() {
      this.isOpen = true;
      this.dom.el.classList.add('open');
      this.dom.display.setAttribute('aria-expanded', true);
      this.curr = this.options.filter((op) => !op.disabled && op.value == this.dom.hidden.value)[0];
      let scrollTop = 0; if (this.curr) {
        const which = this.dom.list.querySelector(`#${this.id}--${this.curr.key}`);
        scrollTop = which ? which.offsetTop - this.rem2px(5) : 0; }
      this.dom.list.scrollTop = scrollTop < 0 ? 0 : scrollTop;
      if (this.hasSearch) { this.dom.search.focus(); this.dom.display.tabIndex = -1; }
    }
    close() {
      this.curr = null;
      this.isOpen = false;
      this.dom.display.tabIndex = 0;
      this.dom.el.classList.remove('open');
      this.dom.display.removeAttribute('aria-activedescendant');
      this.dom.display.setAttribute('aria-expanded', false);
      const options = this.dom.list.querySelectorAll(`.${S_PREFIX}--option`);
      options.forEach(o => o.classList.contains('focus') ? o.classList.remove('focus') : 0);    
    }
    focusEvents() {
      window.addEventListener('mousedown', (e) => {
        if (!this.dom.el.contains(e.target)) this.close(); });
    }
    isSelected(key) {
      return this.options.find((o) => o.key == key).selected;
    }
    selectOption(key) {
      if (!this.options.find((o) => o.key).selected) this.toggleSelect(key);
    }
    keyboardEvents() {
      document.addEventListener('keydown', (e) => {
        switch (e.key) {
          case 'Escape': if (this.isOpen) { this.close(); this.dom.display.focus(); } break;
          case 'Tab': if (this.isOpen) this.close(); break;
          case 'PageUp':
            if (this.isOpen) { e.preventDefault(); this.keyEvent = true;
              this.focusOption(this.shown[0]); }
            break;
          case 'PageDown':
            if (this.isOpen) { e.preventDefault(); this.keyEvent = true;
              this.focusOption(this.shown[this.shown.length - 1]); }
            break;
          case 'ArrowUp':
            if (this.isOpen) {
              e.preventDefault(); this.keyEvent = true;
              const currInShownPos = this.shown.indexOf(this.curr);
              if (currInShownPos > 0) this.focusOption(this.shown[currInShownPos - 1]);
            }
            break;
          case 'ArrowDown':
            if (this.isOpen) {
              e.preventDefault(); this.keyEvent = true;
              const currInShownPos = this.shown.indexOf(this.curr);
              if (currInShownPos < (this.shown.length - 1))
                this.focusOption(this.shown[currInShownPos + 1]);
            } 
            else if (!this.isOpen && this.dom.el.contains(document.activeElement)) {
              e.preventDefault(); this.keyEvent = true; this.open();
            }
            break;
          case 'Enter':
            e.preventDefault();
            if (this.dom.el.contains(document.activeElement)) {
              if (this.isOpen) this.toggleAndClose(this.curr ? this.curr.key : null);
              else { this.keyEvent = true; this.open(); } }
            break;
        }
      });
    }
    getOptions() {
      const res = []; let i = 0;
      this.dom.old.querySelectorAll(':scope > optgroup').forEach((og) => {
        og.querySelectorAll(':scope > option').forEach((op) => { i++;
          res.push({ key: i, title: op.title || op.innerHTML, value: op.value, img: op.dataset.img 
            || '', desc: op.dataset.desc || '', group: og.label, selected: op.selected, disabled: op.disabled });
        });
      });
      this.dom.old.querySelectorAll(':scope > option').forEach((op) => { i++;
        res.push({ key: i, title: op.title || op.innerHTML, value: op.value, img: op.dataset.img 
          || '', desc: op.dataset.desc || '', selected: op.selected, disabled: op.disabled });
      });
      return res;
    }
    buildSingleOption(op) {
      let item = document.createElement('li');
      item.classList.add(`${S_PREFIX}--option`);
      item.setAttribute('role', 'option');
      item.id = `${this.dom.el.id}--${op.key}`;
      let body = document.createElement('div');
      body.classList.add(`${S_PREFIX}--option__body`);
      let title = document.createElement('span');
      title.innerHTML = op.title;
      body.appendChild(title);
      if (op.img) {
        let img = document.createElement('img');
        img.classList.add(`${S_PREFIX}--option__img`);
        img.src = op.img;
        img.alt = op.title;
        if (op.desc) img.style.marginTop = '.3rem';
        item.insertBefore(img, item.firstChild);
      }
      if (op.desc) {
        let desc = document.createElement('small');
        desc.innerHTML = op.desc;
        title.style.marginTop = '0px';
        body.appendChild(desc);
      }
      item.appendChild(body);
      if (!op.disabled) {
        item.onclick = () => this.toggleAndClose(op.key);
        item.onmouseenter = () => {
          if (this.keyEvent) return this.keyEvent = false;
          this.curr = op;
          const options = this.dom.list.querySelectorAll(`.${S_PREFIX}--option`);
          options.forEach(t => t.classList.remove('focus'));
          item.classList.add('focus');
          if (op.id && this.hasSearch) this.dom.search.setAttribute('aria-activedescendant', op.id);
          if (op.id) this.dom.display.setAttribute('aria-activedescendant', op.id);
        };
      }
      if (op.selected) {
        item.classList.add('selected');
        item.setAttribute('aria-selected', true);
      }
      if (op.disabled) {
        item.setAttribute('aria-disabled', true);
        item.classList.add('disabled');
      }
      if (this.curr && this.curr.value == op.value) { 
        item.classList.add('focus');
      }
      return item;
    }
    printOptions(options) {
      this.dom.list.innerHTML = '';
      const groups = [...new Set(options.map((op) => op.group).filter((gr) => !!gr))];
      groups.forEach((gr) => {
        const grItem = document.createElement('li');
        grItem.classList.add(`${S_PREFIX}__group`);
        grItem.setAttribute('aria-label', gr);
        grItem.setAttribute('role', 'none');
        grItem.innerHTML = gr;
        this.dom.list.appendChild(grItem);
        options.filter((op) => op.group == gr).forEach((top) => this.dom.list
          .appendChild(this.buildSingleOption(top)));
      });
      options.filter((op) => !op.group).forEach((op) => this.dom.list
        .appendChild(this.buildSingleOption(op)));
    }
    toggleAndClose(key) {
      if (key) this.toggleSelect(key);
      if (!this.multiple) { this.close(); setTimeout(()=>this.dom.display.focus()); }
    }
    toggleSelect(key) {
      const dest = this.dom.search ? this.dom.search : this.dom.display;
      if (this.multiple) dest.focus();
      this.options.forEach((op) => {
        if (!this.multiple && op.key != key) op.selected = false;
        if (op.key == key && !op.disabled) op.selected = this.multiple ? !op.selected : true;
      });
      const selected = this.options.filter((op) => op.selected);
      if (!selected.length) this.dom.display.innerHTML = '<span>' + this.placeholder + '</span>';
      else this.dom.display.innerHTML = '<span>' + 
      	selected.map((op) => op.title).join('</span>,<span>') + '</span>';
      this.dom.hidden.value = selected.map((op) => op.value).join(',');
      this.dom.hidden.dispatchEvent(this.onChangeEvent);
      if (this.multiple) this.printOptions(this.shown);
      else { this.dom.search.value = ''; this.doSearch(''); }
    }
    doSearch(key) {
    	this.curr = null;
      key = key.toLowerCase().trim();
      this.shown = this.options.filter((op) => (op.group && op.group.toLowerCase().includes(key))
       || op.title.toLowerCase().includes(key)
       || op.value.toLowerCase().includes(key)
       || op.desc.toLowerCase().includes(key));
      if (!this.shown.length) {
        const item = document.createElement('li');
        item.classList.add(`${S_PREFIX}__noresult`);
        item.setAttribute('aria-live', 'polite');
        item.innerHTML = this.locale.NO_RESULT;
        this.dom.list.innerHTML = '';
        this.dom.list.appendChild(item);
      } else this.printOptions(this.shown);
    }
    init() {
      this.keyboardEvents();
      this.focusEvents();
      this.options = this.getOptions();
      this.options.forEach((o) => (o.selected = false));
      if (this.value.length > 0) {
        this.value.split(",").forEach((v) => {
          let op = this.options.find((o) => o.value === v);
          if (op) op.selected = true;
        });
      }
      this.shown = this.options;
      const el = document.createElement('div');
      el.classList.add(`${S_PREFIX}`);
      el.id = this.id;
      const display = document.createElement('button');
      display.classList.add(`${S_PREFIX}__display`);
      display.type = 'button';
      display.setAttribute('role', 'combobox');
      display.setAttribute('aria-multiselectable', this.multiple);
      display.setAttribute('aria-label', this.name);
      display.setAttribute('aria-disabled', this.disabled);
      display.setAttribute('aria-expanded', this.isOpen);
      display.setAttribute('aria-owns', `${el.id}_list`);
      display.onclick = () => { if (this.isOpen) this.close(); else if (!this.disabled) this.open(this.curr); };
      if (!!this.curr && !!this.curr.key) display.setAttribute('aria-activedescendant', `${el.id}--${this.curr.key}`);
      display.innerHTML = this.options.filter((op) => op.selected).map((op) => op.title).join(',');
      if (display.innerHTML.length == 0) display.innerHTML = '<span>' + this.placeholder + '</span>';
      this.dom.display = display;
      const hidden = document.createElement('input');
      hidden.MODEL = this;
      hidden.tabIndex = -1;
      hidden.readOnly = true;
      hidden.name = this.name;
      hidden.disabled = this.disabled;
      hidden.setAttribute('aria-hidden', true);
      hidden.classList.add(`${S_PREFIX}__hidden`);
      hidden.value = this.options.filter((op) => op.selected).map((op) => op.value).join(',');
      this.dom.hidden = hidden;
      el.appendChild(display);
      el.appendChild(hidden);
      const menu = document.createElement('div');
      menu.classList.add(`${S_PREFIX}__menu`);
      menu.id = `${el.id}_menu`;
      if (this.hasSearch) {
        const search = document.createElement('input');
        search.classList.add(`${S_PREFIX}__search`);
        search.setAttribute('role', 'searchbox');
        search.setAttribute('aria-label', this.locale.SEARCH);
        search.setAttribute('aria-autocomplete', 'list');
        search.setAttribute('aria-controls', `${el.id}_list`);
        if (this.curr && this.curr.key)
          search.setAttribute('aria-activedescendant', `${el.id}--${this.curr.key}`);
        search.autocapitalize = 'none';
        search.autocomplete = 'off';
        search.spellcheck = 'off';
        search.placeholder = this.locale.SEARCH;
        search.type = 'search';
        search.oninput = () => this.doSearch(search.value);
        menu.appendChild(search);
        this.dom.search = search;
      }
      if (this.isOpen) listCont.tabIndex = 0;
      const list = document.createElement('ul');
      list.classList.add(`${S_PREFIX}__list`);
      list.setAttribute('role', 'listbox');
      list.id = `${el.id}_list`;
      list.setAttribute('aria-label', this.name);
      list.setAttribute('aria-expanded', this.isOpen);
      this.dom.list = list;
      menu.appendChild(list);  
      el.appendChild(menu);
      this.dom.el = el;
      this.printOptions(this.options);
      const old = this.dom.old;
      old.parentElement.insertBefore(el, old);
      if (old.name === this.name) old.name = '_' + old.name;
      old.style.display = 'none';
      const offTop = el.offsetTop, winHeight = window.innerHeight;
      if (offTop >= 0.5 * winHeight) el.classList.add('reverse');
      this.onChangeEvent = new CustomEvent(`${S_PREFIX}-change`);
      this.onCreateEvent = new CustomEvent(`${S_PREFIX}-create`);
      window.dispatchEvent(this.onCreateEvent);
    }
    rem2px(rem) { return rem * S_FONTSIZE; }
  }
  window.F1.Select = Select;
}( window, document ) );