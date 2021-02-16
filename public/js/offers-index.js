(function () {
    // Exports panel
    const exportsPanelCaptionText = 'Click here to choise template for exports all selected items...';
    let exportsPanel = document.querySelector('.js-exports-panel');
    let templatesGallery = document.querySelector('.templates-gallery');
    let preloader = document.querySelector('.loader');
    if (exportsPanel && templatesGallery) {
        const closeText = 'Close';
        const processStart = 'Loading...';
        const processingText = 'Processing...';
        let caption = exportsPanel.children[0];
        caption.innerHTML = exportsPanelCaptionText;
        exportsPanel.addEventListener('click', () => {
            let gallery = templatesGallery;
            let action  = gallery.getAttribute('data-action');
            if (caption.innerHTML == closeText) {
                gallery.classList.remove('d-block');
                gallery.classList.add('d-none');
                return caption.innerHTML = exportsPanelCaptionText;
            }
            if (gallery.innerHTML.length > 200) {
                gallery.classList.remove('d-none');
                gallery.classList.add('d-block');
                return caption.innerHTML = closeText;
            }
            gallery.classList.remove('d-none');
            gallery.innerHTML = processStart;
            axios.post(action)
                .then((response) => {
                    if (success = response.data.success) {
                        if (content = response.data.content) {
                            gallery.innerHTML = content;
                            // gallery.classList.toggle('d-none');
                            gallery.classList.toggle('d-block');
                            caption.classList.toggle('d-block');
                            caption.classList.toggle('d-none');
                            caption.innerHTML = closeText;
                            let galleryItems = gallery.querySelectorAll('.js-gallery-item');
                            if (galleryItems.length) {

                                galleryItems.forEach((item) => {

                                    item.addEventListener('click', () => {
                                        console.log(item);
                                        let action = item.getAttribute('data-action');
                                        console.log(action);
                                        let offerSelector = offersTable.querySelectorAll('.js-offer-selector:checked');
                                        if (offerSelector.length > 4) {
                                            alert('Max offers quantity to choose: 4');
                                            return false;
                                        }
                                        $('#exportFilter').modal('show');
                                        let generatePres = document.querySelector('#generatePres');

                                        generatePres.addEventListener('click', function () {
                                            $('#exportFilter').modal('hide');
                                            preloader.style.display = 'block';

                                            let filterItems = $('.filter-items:checked');
                                            let filterItemsVal = {};
                                            filterItems.each(function (id, item) {
                                                if (!filterItemsVal[item.dataset.category]) filterItemsVal[item.dataset.category] = {};
                                                filterItemsVal[item.dataset.category][item.getAttribute('name')] = item.value;
                                            });
                                            // exportsPanel.click();


                                            axios.post(action, filterItemsVal)
                                                .then((response) => {
                                                    if (success = response.data.success) {
                                                        let content = response.data.content;
                                                        gallery.innerHTML = content;
                                                        console.log(content);
                                                        console.log(gallery.innerHTML.length);
                                                        preloader.style.display = 'none';
                                                    }
                                                })
                                                .catch((failure) => {
                                                    console.log(failure);
                                                    alert('Failed to export...');
                                                });
                                        });


                                    });
                                });
                            }
                        }
                    }
                })
                .catch((failure) => {
                    alert('Fail to load the templates...');
                });
        });
    }

    // Show/hide the property filters
    let withPropertys = document.querySelector('#withPropertys');
    if (withPropertys) {
        withPropertys.addEventListener('change', () => {
            let propertys = document.querySelector('#propertyFilters');
            if (withPropertys.checked) {
                propertys.classList.remove('d-none');
                propertys.classList.add('d-block');
            } else {
                propertys.classList.remove('d-block');
                propertys.classList.add('d-none');
            }
        });
    }

    // Handler to switch the offer propertys visiblity
    let propertySwitchers = document.querySelectorAll('.js-property-switcher');
    if (propertySwitchers) {
        propertySwitchers.forEach((item) => {
            item.addEventListener('click', () => {
                let element = item.parentNode.cells[0].querySelector('input');
                let elementId = element.getAttribute('data-id');
                let propertysBlock = document.querySelector('#propertysBlock' + elementId);
                if (propertysBlock.classList.contains('d-none')) {
                    propertysBlock.classList.remove('d-none');
                    propertysBlock.classList.add('table-row');
                } else {
                    propertysBlock.classList.remove('table-row');
                    propertysBlock.classList.add('d-none');
                }
            });
        });
    }

    // Handler to select the offer row
    let offersTable = document.querySelector('.js-offers-table');
    if (offersTable) {
        let action = offersTable.getAttribute('data-action');
        let selectors = offersTable.querySelectorAll('.js-offer-selector');
        selectors.forEach((item) => {
            item.addEventListener('click', () => {
                axios.post(action, {'offer_id': item.getAttribute('data-id')})
                    .then((response) => {
                        if (success = response.data.success) {
                            item.checked = response.data.checked;
                            if (response.data.checked === false) {
                                uncheckOfferPropertys(item.getAttribute('data-id'));
                            }
                            manageExportsPanel();
                        }
                    })
                    .catch((failure) => {
                        alert('Fail to select this offer...');
                    });
            });
        });
        const manageExportsPanel = () => {
            let offerRows = document.querySelectorAll('.js-offer-row');
            if (offerRows.length == 0) {
                return;
            }
            let panel = exportsPanel;
            let gallery = templatesGallery;
            let caption = panel.children[0];
            let selected = [];
            offerRows.forEach((item) => {
                let element = item.cells[0].getElementsByTagName('input')[0];
                if (element.checked == true) {
                    selected.push(element.getAttribute('data-id'));
                }
            });
            if (selected.length > 0) {
                if (panel.classList.contains('d-none')) {
                    panel.classList.remove('d-none');
                    panel.classList.add('d-block');
                }
            } else if (selected.length == 0) {
                if (panel.classList.contains('d-block')) {
                    panel.classList.remove('d-block');
                    panel.classList.add('d-none');
                }
                if (gallery.classList.contains('d-block')) {
                    gallery.classList.remove('d-block');
                    gallery.classList.add('d-none');
                }
                caption.innerHTML = exportsPanelCaptionText;
            }
        }
        const uncheckOfferPropertys = (id) => {
            let propertysBlock = document.querySelector('#propertysBlock' + id);
            let table = propertysBlock.querySelector('.js-propertys-table');
            if (table) {
                let propertyIds = [];
                let selectors = table.querySelectorAll('.js-property-selector');
                selectors.forEach((item) => {
                    if (item.checked == true) {
                        propertyIds.push(item.getAttribute('data-id'));
                        item.checked = false;
                    }
                });
                if (propertyIds.length == 0) {
                    return;
                }
                let action = table.getAttribute('data-action');
                axios.post(action, {'data': propertyIds})
                    .then((response) => {
                        // OK...
                    })
                    .catch((failure) => {
                        alert('Fail to uncheck the propertys...');
                    });
            }
            propertysBlock.classList.remove('table-row');
            propertysBlock.classList.add('d-none');
        }
    }

    // Handler to select the property row
    let propertyTables = document.querySelectorAll('.js-propertys-table');
    if (propertyTables) {
        propertyTables.forEach((table) => {
            let action = table.getAttribute('data-action');
            let offerId = table.getAttribute('data-offer-id');
            let selectors = table.querySelectorAll('.js-property-selector');
            selectors.forEach((item) => {
                item.addEventListener('click', () => {
                    axios.post(action, {'data': item.getAttribute('data-id')})
                        .then((response) => {
                            if (success = response.data.success) {
                                item.checked = response.data.checked;
                                if (response.data.checked == true) {
                                    let selector = document.getElementById('offer' + offerId);
                                    let checkbox = selector.cells[0].querySelector('input');
                                    if (checkbox.checked == false) {
                                        checkbox.click();
                                    }
                                }
                            }
                        })
                        .catch((failure) => {
                            alert('Fail to select this property...');
                        });
                });
            });
        });
    }

    // Search filters
    let searchFilter = document.querySelector('#searchFilter');
    if (searchFilter) {
        const btnProcess = 'Searching...';
        const btnEmpty = 'Found offers: 0';
        const btnShow = 'Show offers: ';
        let button = searchFilter.querySelector('.js-button');
        let elements = ['radio', 'checkbox', 'select', 'textinput'];
        elements.forEach((item) => {
            if (selectors = searchFilter.querySelectorAll('.js-' + item)) {
                selectors.forEach((selector) => {
                    selector.addEventListener('change', () => {
                        let data = new FormData(searchFilter);
                        sendRequest(data);
                    });
                });
            }
        });
        const processing = (status) => {
            if (status == 'start') {
                button.disabled = true;
                button.classList.remove('text-danger');
                button.value = btnProcess;
            } else if (status == 'empty') {
                button.disabled = true;
                button.classList.add('text-danger');
                button.value = btnEmpty;
            } else if (status == 'show') {
                button.disabled = false;
                button.classList.remove('text-danger');
            }
        }
        const bindUrl = (url) => {
            button.addEventListener('click', () => {
                window.location = url;
            });
        }
        const sendRequest = (data) => {
            processing('start');
            axios.post(searchFilter.action, data)
                .then((response) => {
                    if (success = response.data.success) {
                        let results = response.data.results;
                        if (results > 0) {
                           processing('show');
                           button.value = btnShow + results;
                        } else {
                            processing('empty');
                        }
                        if (url = response.data.url) {
                            bindUrl(url);
                        }
                    }
                })
                .catch((failure) => {
                    alert('The search failed...');
                });
        }
    }

}());
