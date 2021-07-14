var mapleOptions = {
    separator: '|*|',
    dialogOpened: false,
    init: function (options) {
        mapleOptions.setCheckboxClickHandlers();
        mapleOptions.setHelpFunc();
        mapleOptions.setOnOffFunc();
        mapleOptions.setTextImageFunc();
        mapleOptions.setLeftRightFunc();
        mapleOptions.setLightDarkFunc();
        mapleOptions.setColorpickFunc();
        mapleOptions.setStyleSelectFunc();
        jQuery(".sortable").sortable();
        var mainNavOptions = {};
        if (options.cookie) {
            mainNavOptions = {
                cookie: {
                    name: 'tabs',
                    expires: 1
                }
            }
        }
        mapleOptions.setTabs(options.cookie);
        jQuery('#options-submit').bind('click', function (event) {
            event.preventDefault();
            jQuery('#maple-options').submit()
        });
        jQuery('#maple-content-container').delegate('.hover', 'mouseover', function () {
            jQuery(this).css({
                cursor: 'pointer'
            })
        });
        jQuery('.sortable').delegate('input', 'focusin', function () {
            jQuery(this).addClass('selected')
        }).delegate('input', 'focusout', function () {
            jQuery(this).removeClass('selected')
        });
        jQuery('#maple-content-container').append('<input type="hidden" value="TW Options Panel" />')
    },
    setTabs: function (enableCookies) {
        jQuery('.main-navigation-container').hide();
        var selectedClass = 'ui-tabs-selected',
            mainNavCookie = 'tw-main-navigation',
            subNavCookie = 'tw-sub-navigation',
            mainNotSel = (enableCookies && jQuery.cookie(mainNavCookie)) ? jQuery.cookie(mainNavCookie) : ':first',
            mainSel = mainNotSel === ':first' ? 'a:first' : 'a[href="' + mainNotSel + '"]';
        if (mainNotSel === ':first') {
            jQuery('.main-navigation-container:first').show()
        } else {
            jQuery(mainNotSel).show()
        }
        jQuery('#content').css({
            backgroundImage: 'none'
        });
        jQuery('#navigation ' + mainSel).closest('li').addClass(selectedClass);
        jQuery('.main-navigation-container').each(function () {
            var thisId = '#' + jQuery(this).attr('id'),
                notSel = (enableCookies && jQuery.cookie(thisId)) ? jQuery.cookie(thisId) : ':first',
                sel = notSel === ':first' ? 'a.tab:first' : 'a.tab[href="' + notSel + '"]';
            jQuery(this).find('.sub-navigation-container').not(notSel).hide();
            jQuery(this).find(sel).closest('li').addClass(selectedClass)
        });
        jQuery('#navigation a').click(function (event) {
            event.preventDefault();
            var href = jQuery(this).attr('href');
            jQuery('.main-navigation-container').hide();
            jQuery(href).show();
            jQuery('#navigation li').removeClass(selectedClass);
            jQuery(this).closest('li').addClass(selectedClass);
            if (enableCookies) {
                jQuery.cookie(mainNavCookie, href)
            }
        });
        jQuery('a.tab').click(function (event) {
            event.preventDefault();
            var href = jQuery(this).attr('href');
            jQuery(href).show().siblings('.sub-navigation-container').hide();
            jQuery(this).closest('li').addClass(selectedClass).siblings('li').removeClass(selectedClass);
            if (enableCookies) {
                var parentId = '#' + jQuery(this).closest('div.main-navigation-container').attr('id');
                jQuery.cookie("options-subnav", href)
            }
        });
        
        if (jQuery.cookie('options-subnav') !== null ){
	        jQuery( 'a[href="'+ jQuery.cookie('options-subnav') +'"]' ).click();
        }
    },
    removeSavedMessage: function () {
        jQuery('#saved_box').slideUp('slow')
    },
    setStyleSelectFunc: function () {
        jQuery('.styles-holder').each(function () {
            jQuery(this).delegate('a.style-box', 'click', function (event) {
                event.preventDefault();
                var $that = jQuery(this),
                    $parent = jQuery(this).parent();
                $parent.addClass('selected-style').siblings('.selected-style').removeClass('selected-style');
                $parent.parent().siblings('input').attr("value", $that.attr('title'))
            })
        })
    },
    setHelpFunc: function () {
        jQuery('#maple-content-container').delegate('a.help-button', 'click', function (event) {
            event.preventDefault();
            if (!mapleOptions.dialogOpened) {
                jQuery(this).find('.help-dialog:first').clone().dialog({
                    autoOpen: true,
                    title: jQuery(this).attr('title'),
                    closeText: '',
                    open: function () {
                        mapleOptions.dialogOpened = true
                    },
                    close: function () {
                        mapleOptions.dialogOpened = false
                    }
                })
            }
        })
    },
    setColorpickFunc: function () {
        jQuery('input.color').ColorPicker({
            onSubmit: function (hsb, hex, rgb, el) {
                jQuery(el).val(hex);
                jQuery(el).ColorPickerHide();
                jQuery(el).siblings('.color-preview').css({
                    backgroundColor: '#' + hex
                })
            },
            onBeforeShow: function () {
                jQuery(this).ColorPickerSetColor(this.value)
            }
        }).bind('keyup', function () {
            var value = this.value;
            jQuery(this).ColorPickerSetColor(value);
            var bgColor = value === '' ? 'transparent' : '#' + value;
            jQuery(this).siblings('.color-preview').css({
                backgroundColor: bgColor
            })
        });
        jQuery('.color-preview').ColorPicker({
            onSubmit: function (hsb, hex, rgb, el) {
                jQuery(el).css({
                    backgroundColor: '#' + hex
                }).ColorPickerHide();
                jQuery(el).siblings('input.color').attr("value", hex)
            },
            onBeforeShow: function () {
                jQuery(this).ColorPickerSetColor(jQuery(this).siblings('input.color').attr('value'))
            }
        }).bind({
            'keyup': function () {
                jQuery(this).ColorPickerSetColor(this.value)
            },
            'mouseover': function () {
                jQuery(this).css({
                    cursor: 'pointer'
                })
            }
        })
    },
    setOnOffFunc: function () {
		var maple_is_rtl = jQuery('body').hasClass('rtl');
        jQuery('div.on-off').each(function () {
            if (jQuery(this).siblings('input[type=hidden]:first').attr('value') === 'on') {
                if (maple_is_rtl){
					jQuery(this).find('span').css({
						marginRight: 2
					})
                } else {
	                jQuery(this).find('span').css({
	                    marginLeft: 49
	                })
                }
            } else {
	            if (maple_is_rtl){
					jQuery(this).find('span').css({
						marginRight: 49
					})
                }
            }
        });
        jQuery('div.on-off').bind('click', function () {
            var hiddenInput = jQuery(this).siblings('input[type=hidden]:first');
            if (hiddenInput.attr('value') == 'on') {
	            if (maple_is_rtl){
		            jQuery(this).find('span').animate({
	                    marginRight: 49
	                });
	            } else {
		            jQuery(this).find('span').animate({
	                    marginLeft: 2
	                });
	            }
                hiddenInput.attr('value', 'off')
            } else {
	            if (maple_is_rtl){
		            jQuery(this).find('span').animate({
	                    marginRight: 2
	                });
	            } else {
		            jQuery(this).find('span').animate({
	                    marginLeft: 49
	                });
	            }
                hiddenInput.attr('value', 'on')
            }
        })
    },
    setTextImageFunc: function () {
        jQuery('div.text-image').each(function () {
            if (jQuery(this).siblings('input[type=hidden]:first').attr('value') === 'text') {
                jQuery(this).find('span').css({
                    marginLeft: 49
                })
            }
        });
        jQuery('div.text-image').bind('click', function () {
            var hiddenInput = jQuery(this).siblings('input[type=hidden]:first');
            if (hiddenInput.attr('value') == 'text') {
                jQuery(this).find('span').animate({
                    marginLeft: 2
                });
                hiddenInput.attr('value', 'image')
            } else {
                jQuery(this).find('span').animate({
                    marginLeft: 49
                });
                hiddenInput.attr('value', 'text')
            }
        })
    },
    setLeftRightFunc: function () {
        jQuery('div.left-right').each(function () {
            if (jQuery(this).siblings('input[type=hidden]:first').attr('value') === 'right') {
                jQuery(this).find('span').css({
                    marginLeft: 49
                })
            }
        });
        jQuery('div.left-right').bind('click', function () {
            var hiddenInput = jQuery(this).siblings('input[type=hidden]:first');
            if (hiddenInput.attr('value') == 'right') {
                jQuery(this).find('span').animate({
                    marginLeft: 2
                });
                hiddenInput.attr('value', 'left')
            } else {
                jQuery(this).find('span').animate({
                    marginLeft: 49
                });
                hiddenInput.attr('value', 'right')
            }
        })
    },
    setLightDarkFunc: function () {
        jQuery('div.light-dark').each(function () {
            if (jQuery(this).siblings('input[type=hidden]:first').attr('value') === 'light') {
                jQuery(this).find('span').css({
                    marginLeft: 49
                })
            }
        });
        jQuery('div.light-dark').bind('click', function () {
            var hiddenInput = jQuery(this).siblings('input[type=hidden]:first');
            if (hiddenInput.attr('value') == 'light') {
                jQuery(this).find('span').animate({
                    marginLeft: 2
                });
                hiddenInput.attr('value', 'dark')
            } else {
                jQuery(this).find('span').animate({
                    marginLeft: 49
                });
                hiddenInput.attr('value', 'light')
            }
        })
    },
    loadUploader: function (element, pathToPhp, uploadsUrl, multi) {
		if (multi == null){
			multi = false;
		}
        var button = element,
            interval, buttonSpan, treethemesButtonSpan, treethemesButton, treethemesInterval;
        new AjaxUpload(button, {
            action: pathToPhp,
            name: "treethemesfile",
            onSubmit: function (file, ext) {
	            treethemesButton = button;
                buttonSpan = button.find('span');
                if (!buttonSpan.length) {
                    buttonSpan = button
                }
                buttonSpan.text('Upload');
                this.disable();
                interval = window.setInterval(function () {
                    var text = button.text();
                    if (text.length < 10) {
                        buttonSpan.text(text + '.')
                    } else {
                        buttonSpan.text('.')
                    }
                }, 200)
            },
            onComplete: function (file, response) {		
        		var auxResp = response;
				var treethemesButtonSpan = buttonSpan;
				var treethemesInterval = interval;
				var treethemesThisAux = this;
				
				if (auxResp == '') {
					var ifrmae = jQuery('iframe[rel="treethemesUploadHelper"]')[0];
					if (ifrmae){
						var ifrmaeInt = setInterval(function(){
							if ( ifrmae.contentDocument.body.innerHTML != "" ){
								auxResp = ifrmae.contentDocument.body.innerHTML;
								imgUrl = uploadsUrl + '/' + auxResp;
								var defVal = treethemesButton.siblings('input.upload:first').attr('value');
								if(multi && defVal != "")
									treethemesButton.siblings('input.upload:first').attr('value', defVal+'|*|'+imgUrl);
								else
								treethemesButton.siblings('input.upload:first').attr('value', imgUrl);

								treethemesButtonSpan.text('Upload');
								treethemesThisAux.enable();
								
								ifrmae.remove();
								
								window.clearInterval(treethemesInterval);
								clearInterval(ifrmaeInt);
							}
						}, 100);
					}
				} else { 
					imgUrl = uploadsUrl + '/' + auxResp;
					var defVal = button.siblings('input.upload:first').attr('value');
					if(multi && defVal != "")
						button.siblings('input.upload:first').attr('value', defVal+'|*|'+imgUrl);
					else
					button.siblings('input.upload:first').attr('value', imgUrl);

					buttonSpan.text('Upload');
					window.clearInterval(interval);
					
					this.enable()
				}
            }
        })
    },
    setCheckboxClickHandlers: function () {
        jQuery(".check").click(function (event) {
            event.preventDefault();
            var that = jQuery(this),
                value = that.attr('title'),
                checked = false,
                selectedClass = 'selected-check',
                hiddenInput = jQuery(that.parents().get(1)).siblings(".hidden-value:first"),
                hiddenIds = hiddenInput.val(),
                idsArray = hiddenIds === '' ? [] : hiddenIds.split(',');
            that.toggleClass(selectedClass);
            checked = that.hasClass(selectedClass);
            if (checked) {
                idsArray.push(value)
            } else {
                idsArray = jQuery.grep(idsArray, function (val) {
                    return val != value
                })
            }
            hiddenIds = idsArray.join(',');
            hiddenInput.val(hiddenIds)
        })
    },
    showSavedImgData: function (optionsData) {
        var count = optionsData.inputIds.length;
        var data = [];
        if (optionsData.hiddenIds[i]){
		    for (var i = 0; i < count; i++) {
	            data[i] = jQuery(optionsData.hiddenIds[i]).val().split(mapleOptions.separator)
	        } 
	        for (var i = 0; i < count; i++) {
	            data[i] = jQuery(optionsData.hiddenIds[i]).val().split(mapleOptions.separator)
	        }
          	var entryCount = data[0].length;
	        for (var j = 0; j < entryCount - 1; j++) {
	            var html = '<li>';
	            for (var i = 0; i < count; i++) {
	                if (optionsData.preview && optionsData.inputIds[i] === '#' + optionsData.preview) {
	                    html += mapleOptions.generatePreview(data[i][j])
	                }
	                var none = data[i][j] === '' ? '<i>---</i>' : '';
	                html += '<b>' + optionsData.labels[i] + ': </b><span class="' + optionsData.spanClasses[i] + '">' + data[i][j] + '</span>' + none + '<br/>'
	            }
	            html += '<div class="editButton hover"></div><div class="deleteButton hover"></div></li>';
	            jQuery(optionsData.ulId).append(html)
	        }
        }
        
    },
    generatePreview: function (imgUrl) {
        return '<img src="' + imgUrl + '" />'
    },
    setCustomFieldsFunc: function (mainId, fieldIds, labels, istextarea, preview) {
        inputIds = [];
        hiddenIds = [];
        spanClasses = [];
        for (var i = 0, length = fieldIds.length; i < length; i++) {
            inputIds[i] = '#' + fieldIds[i];
            hiddenIds[i] = '#' + fieldIds[i] + 's';
            spanClasses[i] = fieldIds[i] + '_span'
        }
        var ulId = '#' + mainId + '_list';
        var addButton = '#' + mainId + '_button';
        optionsData = {
            inputIds: inputIds,
            hiddenIds: hiddenIds,
            spanClasses: spanClasses,
            istextarea: istextarea,
            ulId: ulId,
            labels: labels,
            addButton: addButton,
            preview: preview
        };
        mapleOptions.setCommonAddFunc(optionsData)
    },
    setCommonAddFunc: function (optionsData) {
        mapleOptions.showSavedImgData(optionsData);
        jQuery(optionsData.addButton).click(function (event) {
            event.preventDefault();
            mapleOptions.addItem(optionsData)
        });
        jQuery(optionsData.ulId).bind('sortstop', function (event, ui) {
            mapleOptions.setSliderImgChanges(optionsData)
        });
        mapleOptions.setActionButtonHandlers(optionsData)
    },
    addItem: function (optionsData) {
        var length = optionsData.inputIds.length;
        var html = '<li>';
        for (var i = 0; i < length; i++) {
            if (optionsData.preview && optionsData.inputIds[i] === '#' + optionsData.preview) {
                html += mapleOptions.generatePreview(jQuery(optionsData.inputIds[i]).attr("value"))
            }
            html += '<b>' + optionsData.labels[i] + ': </b><span class="' + optionsData.spanClasses[i] + '">' + jQuery(optionsData.inputIds[i]).attr("value") + '</span><br/>'
        }
        html += '<div class="editButton hover"></div><div class="deleteButton hover"></li>';
        jQuery(optionsData.ulId).append(html);
        mapleOptions.setSliderImgChanges(optionsData)
    },
    setSliderImgChanges: function (optionsData) {
        var count = optionsData.inputIds.length;
        var values = [];
        for (i = 0; i < count; i++) {
            values[i] = ''
        }
        jQuery(optionsData.ulId + ' li').each(function () {
            for (i = 0; i < count; i++) {
                values[i] += jQuery(this).find('span.' + optionsData.spanClasses[i]).html() + mapleOptions.separator
            }
        });
        for (i = 0; i < count; i++) {
            jQuery(optionsData.hiddenIds[i]).val(values[i])
        }
    },
    setActionButtonHandlers: function (optionsData) {
        jQuery(optionsData.ulId).delegate('.deleteButton', 'click', function () {
            jQuery(this).parent("li").remove();
            mapleOptions.setSliderImgChanges(optionsData)
        });
        jQuery(optionsData.ulId).delegate('.editButton', 'click', function () {
            var currentLi = jQuery(this).parent('li');
            currentLi.find('i').remove();
            currentLi.find('span').each(function (i) {
                var that = jQuery(this),
                    spanclass = that.attr('class'),
                    spanvalue = that.html();
                if (optionsData.istextarea[i]) {
                    that.replaceWith(jQuery('<textarea type="text" class="inputarea ' + spanclass + '" >' + spanvalue + '</textarea>'))
                } else {
                    that.replaceWith(jQuery('<input type="text" value="' + spanvalue + '" class="' + spanclass + '" />'))
                }
            });
            jQuery(this).replaceWith(jQuery('<div class="doneButton hover"></div>').click(function (e) {
                e.preventDefault();
                currentLi.find('input,textarea').each(function () {
                    var that = jQuery(this),
                        spanclass = that.attr('class'),
                        spanvalue = that.val();
                    var none = spanvalue === '' ? '<i>---</i>' : '';
                    that.replaceWith(jQuery('<span class="' + spanclass + '">' + spanvalue + '</span>' + none))
                });
                mapleOptions.setSliderImgChanges(optionsData);
                jQuery(this).replaceWith('<div class="editButton hover"></div>')
            }))
        })
    },
    makeExportFile: function(optionsData) { 
    	/* create the file */
    	console.log('download the file');
    }
};

var maple_StyleOptionsManager = {
    separator: '|*|',
    dialogOpened: false,
    init: function (options) {
        maple_StyleOptionsManager.setCheckboxClickHandlers();
        maple_StyleOptionsManager.setHelpFunc();
        maple_StyleOptionsManager.setOnOffFunc();
        maple_StyleOptionsManager.setTextImageFunc();
        maple_StyleOptionsManager.setLeftRightFunc();
        maple_StyleOptionsManager.setLightDarkFunc();
        maple_StyleOptionsManager.setColorpickFunc();
        maple_StyleOptionsManager.setStyleSelectFunc();
        jQuery(".sortable").sortable();
        var mainNavOptions = {};
        if (options.cookie) {
            mainNavOptions = {
                cookie: {
                    name: 'tabs',
                    expires: 1
                }
            }
        }
        
        jQuery('#options-submit').bind('click', function (event) {
            event.preventDefault();
            jQuery('#maple-style-options').submit()
        });
        jQuery('#maple-content-container').delegate('.hover', 'mouseover', function () {
            jQuery(this).css({
                cursor: 'pointer'
            })
        });
        jQuery('.sortable').delegate('input', 'focusin', function () {
            jQuery(this).addClass('selected')
        }).delegate('input', 'focusout', function () {
            jQuery(this).removeClass('selected')
        });
        jQuery('#maple-content-container').append('<input type="hidden" value="TreeThemes Options Panel" />')

		jQuery('#navigation ul').css({'border':'none'}).children('li').css({'height':'auto'}).find('a').css({'margin':'0 auto'}).children('span');
		
		maple_StyleOptionsManager.setTabs(options.cookie);
    },
    setTabs: function (enableCookies) {
		jQuery('.main-navigation-container').hide();
        var selectedClass = 'ui-tabs-selected',
            mainNavCookie_style = 'tw-style-main-navigation',
            subNavCookie_style = 'tw-style-sub-navigation',
            mainNotSel = (enableCookies && jQuery.cookie(mainNavCookie_style)) ? jQuery.cookie(mainNavCookie_style) : ':first',
            mainSel = mainNotSel === ':first' ? 'a:first' : 'a[href="' + mainNotSel + '"]';
        if (mainNotSel === ':first') {
            jQuery('.main-navigation-container:first').show()
        } else {
            jQuery(mainNotSel).show()
        }
        jQuery('#content').css({
            backgroundImage: 'none'
        });
        jQuery('#navigation ' + mainSel).closest('li').addClass(selectedClass);
        jQuery('.main-navigation-container').each(function () {
            var thisId = '#' + jQuery(this).attr('id'),
                notSel = (enableCookies && jQuery.cookie(thisId)) ? jQuery.cookie(thisId) : ':first',
                sel = notSel === ':first' ? 'a.tab:first' : 'a.tab[href="' + notSel + '"]';     
            jQuery(this).find('.sub-navigation-container').not(notSel).hide();
            jQuery(this).find(sel).closest('li').addClass(selectedClass)
        });
        jQuery('#navigation a').click(function (event) {
            event.preventDefault();
            var href = jQuery(this).attr('href');
            jQuery('.main-navigation-container').hide();
            jQuery(href).show();
            jQuery('#navigation li').removeClass(selectedClass);
            jQuery(this).closest('li').addClass(selectedClass);
            if (enableCookies) {
                jQuery.cookie(mainNavCookie_style, href)
            }
        });
        jQuery('a.tab').click(function (event) {
            event.preventDefault();
            var href = jQuery(this).attr('href');
            jQuery(href).show().siblings('.sub-navigation-container').hide();
            jQuery(this).closest('li').addClass(selectedClass).siblings('li').removeClass(selectedClass);
            if (enableCookies) {
                var parentId = '#' + jQuery(this).closest('div.main-navigation-container').attr('id');
                jQuery.cookie("style-options-subnav", href)
            }
        });
        
        if ( jQuery.cookie('style-options-subnav') !== null ){
	        jQuery( 'a[href="'+jQuery.cookie('style-options-subnav')+'"]' ).click();
        }
    },
    removeSavedMessage: function () {
        jQuery('#saved_box').slideUp('slow')
    },
    setStyleSelectFunc: function () {
        jQuery('.styles-holder').each(function () {
            jQuery(this).delegate('a.style-box', 'click', function (event) {
                event.preventDefault();
                var $that = jQuery(this),
                    $parent = jQuery(this).parent();
                $parent.addClass('selected-style').siblings('.selected-style').removeClass('selected-style');
                $parent.parent().siblings('input').attr("value", $that.attr('title'))
            })
        })
    },
    setHelpFunc: function () {
        jQuery('#maple-content-container').delegate('a.help-button', 'click', function (event) {
            event.preventDefault();
            if (!maple_StyleOptionsManager.dialogOpened) {
                jQuery(this).find('.help-dialog:first').clone().dialog({
                    autoOpen: true,
                    title: jQuery(this).attr('title'),
                    closeText: '',
                    open: function () {
                        maple_StyleOptionsManager.dialogOpened = true
                    },
                    close: function () {
                        maple_StyleOptionsManager.dialogOpened = false
                    }
                })
            }
        })
    },
    setColorpickFunc: function () {
        jQuery('input.color').ColorPicker({
            onSubmit: function (hsb, hex, rgb, el) {
                jQuery(el).val(hex);
                jQuery(el).ColorPickerHide();
                jQuery(el).siblings('.color-preview').css({
                    backgroundColor: '#' + hex
                })
            },
            onBeforeShow: function () {
                jQuery(this).ColorPickerSetColor(this.value)
            }
        }).bind('keyup', function () {
            var value = this.value;
            jQuery(this).ColorPickerSetColor(value);
            var bgColor = value === '' ? 'transparent' : '#' + value;
            jQuery(this).siblings('.color-preview').css({
                backgroundColor: bgColor
            })
        });
        jQuery('.color-preview').ColorPicker({
            onSubmit: function (hsb, hex, rgb, el) {
                jQuery(el).css({
                    backgroundColor: '#' + hex
                }).ColorPickerHide();
                jQuery(el).siblings('input.color').attr("value", hex)
            },
            onBeforeShow: function () {
                jQuery(this).ColorPickerSetColor(jQuery(this).siblings('input.color').attr('value'))
            }
        }).bind({
            'keyup': function () {
                jQuery(this).ColorPickerSetColor(this.value)
            },
            'mouseover': function () {
                jQuery(this).css({
                    cursor: 'pointer'
                })
            }
        })
    },
    setOnOffFunc: function () {
        jQuery('div.on-off').each(function () {
            if (jQuery(this).siblings('input[type=hidden]:first').attr('value') === 'on') {
                jQuery(this).find('span').css({
                    marginLeft: 49
                })
            }
        });
        jQuery('div.on-off').bind('click', function () {
            var hiddenInput = jQuery(this).siblings('input[type=hidden]:first');
            if (hiddenInput.attr('value') == 'on') {
                jQuery(this).find('span').animate({
                    marginLeft: 2
                });
                hiddenInput.attr('value', 'off')
            } else {
                jQuery(this).find('span').animate({
                    marginLeft: 49
                });
                hiddenInput.attr('value', 'on')
            }
        })
    },
    setTextImageFunc: function () {
        jQuery('div.text-image').each(function () {
            if (jQuery(this).siblings('input[type=hidden]:first').attr('value') === 'text') {
                jQuery(this).find('span').css({
                    marginLeft: 49
                })
            }
        });
        jQuery('div.text-image').bind('click', function () {
            var hiddenInput = jQuery(this).siblings('input[type=hidden]:first');
            if (hiddenInput.attr('value') == 'text') {
                jQuery(this).find('span').animate({
                    marginLeft: 2
                });
                hiddenInput.attr('value', 'image')
            } else {
                jQuery(this).find('span').animate({
                    marginLeft: 49
                });
                hiddenInput.attr('value', 'text')
            }
        })
    },
    setLeftRightFunc: function () {
        jQuery('div.left-right').each(function () {
            if (jQuery(this).siblings('input[type=hidden]:first').attr('value') === 'right') {
                jQuery(this).find('span').css({
                    marginLeft: 49
                })
            }
        });
        jQuery('div.left-right').bind('click', function () {
            var hiddenInput = jQuery(this).siblings('input[type=hidden]:first');
            if (hiddenInput.attr('value') == 'right') {
                jQuery(this).find('span').animate({
                    marginLeft: 2
                });
                hiddenInput.attr('value', 'left')
            } else {
                jQuery(this).find('span').animate({
                    marginLeft: 49
                });
                hiddenInput.attr('value', 'right')
            }
        })
    },
    setLightDarkFunc: function () {
        jQuery('div.light-dark').each(function () {
            if (jQuery(this).siblings('input[type=hidden]:first').attr('value') === 'light') {
                jQuery(this).find('span').css({
                    marginLeft: 49
                })
            }
        });
        jQuery('div.light-dark').bind('click', function () {
            var hiddenInput = jQuery(this).siblings('input[type=hidden]:first');
            if (hiddenInput.attr('value') == 'light') {
                jQuery(this).find('span').animate({
                    marginLeft: 2
                });
                hiddenInput.attr('value', 'dark')
            } else {
                jQuery(this).find('span').animate({
                    marginLeft: 49
                });
                hiddenInput.attr('value', 'light')
            }
        })
    },
    loadUploader: function (element, pathToPhp, uploadsUrl, multi) {
		if (multi == null){
			multi = false;
		}
        var button = element,
            interval, buttonSpan, treethemesButtonSpan, treethemesButton, treethemesInterval;
        new AjaxUpload(button, {
            action: pathToPhp,
            name: "treethemesfile",
            onSubmit: function (file, ext) {
	            treethemesButton = button;
                buttonSpan = button.find('span');
                if (!buttonSpan.length) {
                    buttonSpan = button
                }
                buttonSpan.text('Upload');
                this.disable();
                interval = window.setInterval(function () {
                    var text = button.text();
                    if (text.length < 10) {
                        buttonSpan.text(text + '.')
                    } else {
                        buttonSpan.text('.')
                    }
                }, 200)
            },
            onComplete: function (file, response) {
            	var auxResp = response;
				var treethemesButtonSpan = buttonSpan;
				var treethemesInterval = interval;
				var treethemesThisAux = this;
				
				if (auxResp == '') {
					var ifrmae = jQuery('iframe[rel="treethemesUploadHelper"]')[0];
					if (ifrmae){
						var ifrmaeInt = setInterval(function(){
							if ( ifrmae.contentDocument.body.innerHTML != "" ){
								auxResp = ifrmae.contentDocument.body.innerHTML;
								imgUrl = uploadsUrl + '/' + auxResp;
								var defVal = treethemesButton.siblings('input.upload:first').attr('value');
								if(multi && defVal != "")
									treethemesButton.siblings('input.upload:first').attr('value', defVal+'|*|'+imgUrl);
								else
								treethemesButton.siblings('input.upload:first').attr('value', imgUrl);

								treethemesButtonSpan.text('Upload');
								treethemesThisAux.enable();
								
								ifrmae.remove();
								
								window.clearInterval(treethemesInterval);
								clearInterval(ifrmaeInt);
							}
						}, 100);
					}
				} else { 
					imgUrl = uploadsUrl + '/' + auxResp;
					var defVal = button.siblings('input.upload:first').attr('value');
					if(multi && defVal != "")
						button.siblings('input.upload:first').attr('value', defVal+'|*|'+imgUrl);
					else
					button.siblings('input.upload:first').attr('value', imgUrl);

					buttonSpan.text('Upload');
					window.clearInterval(interval);
					
					this.enable()
				}
            }
        })
    },
    setCheckboxClickHandlers: function () {
        jQuery(".check").click(function (event) {
            event.preventDefault();
            var that = jQuery(this),
                value = that.attr('title'),
                checked = false,
                selectedClass = 'selected-check',
                hiddenInput = jQuery(that.parents().get(1)).siblings(".hidden-value:first"),
                hiddenIds = hiddenInput.val(),
                idsArray = hiddenIds === '' ? [] : hiddenIds.split(',');
            that.toggleClass(selectedClass);
            checked = that.hasClass(selectedClass);
            if (checked) {
                idsArray.push(value)
            } else {
                idsArray = jQuery.grep(idsArray, function (val) {
                    return val != value
                })
            }
            hiddenIds = idsArray.join(',');
            hiddenInput.val(hiddenIds)
        })
    },
    showSavedImgData: function (optionsData) {
        var count = optionsData.inputIds.length;
        var data = [];
        if (optionsData.hiddenIds[i]){
		    for (var i = 0; i < count; i++) {
	            data[i] = jQuery(optionsData.hiddenIds[i]).val().split(maple_StyleOptionsManager.separator)
	        } 
	        for (var i = 0; i < count; i++) {
	            data[i] = jQuery(optionsData.hiddenIds[i]).val().split(maple_StyleOptionsManager.separator)
	        }
          	var entryCount = data[0].length;
	        for (var j = 0; j < entryCount - 1; j++) {
	            var html = '<li>';
	            for (var i = 0; i < count; i++) {
	                if (optionsData.preview && optionsData.inputIds[i] === '#' + optionsData.preview) {
	                    html += maple_StyleOptionsManager.generatePreview(data[i][j])
	                }
	                var none = data[i][j] === '' ? '<i>---</i>' : '';
	                html += '<b>' + optionsData.labels[i] + ': </b><span class="' + optionsData.spanClasses[i] + '">' + data[i][j] + '</span>' + none + '<br/>'
	            }
	            html += '<div class="editButton hover"></div><div class="deleteButton hover"></div></li>';
	            jQuery(optionsData.ulId).append(html)
	        }
        }
        
    },
    generatePreview: function (imgUrl) {
        return '<img src="' + imgUrl + '" />'
    },
    setCustomFieldsFunc: function (mainId, fieldIds, labels, istextarea, preview) {
        inputIds = [];
        hiddenIds = [];
        spanClasses = [];
        for (var i = 0, length = fieldIds.length; i < length; i++) {
            inputIds[i] = '#' + fieldIds[i];
            hiddenIds[i] = '#' + fieldIds[i] + 's';
            spanClasses[i] = fieldIds[i] + '_span'
        }
        var ulId = '#' + mainId + '_list';
        var addButton = '#' + mainId + '_button';
        optionsData = {
            inputIds: inputIds,
            hiddenIds: hiddenIds,
            spanClasses: spanClasses,
            istextarea: istextarea,
            ulId: ulId,
            labels: labels,
            addButton: addButton,
            preview: preview
        };
        maple_StyleOptionsManager.setCommonAddFunc(optionsData)
    },
    setCommonAddFunc: function (optionsData) {
        maple_StyleOptionsManager.showSavedImgData(optionsData);
        jQuery(optionsData.addButton).click(function (event) {
            event.preventDefault();
            maple_StyleOptionsManager.addItem(optionsData)
        });
        jQuery(optionsData.ulId).bind('sortstop', function (event, ui) {
            maple_StyleOptionsManager.setSliderImgChanges(optionsData)
        });
        maple_StyleOptionsManager.setActionButtonHandlers(optionsData)
    },
    addItem: function (optionsData) {
        var length = optionsData.inputIds.length;
        var html = '<li>';
        for (var i = 0; i < length; i++) {
            if (optionsData.preview && optionsData.inputIds[i] === '#' + optionsData.preview) {
                html += maple_StyleOptionsManager.generatePreview(jQuery(optionsData.inputIds[i]).attr("value"))
            }
            html += '<b>' + optionsData.labels[i] + ': </b><span class="' + optionsData.spanClasses[i] + '">' + jQuery(optionsData.inputIds[i]).attr("value") + '</span><br/>'
        }
        html += '<div class="editButton hover"></div><div class="deleteButton hover"></li>';
        jQuery(optionsData.ulId).append(html);
        maple_StyleOptionsManager.setSliderImgChanges(optionsData)
    },
    setSliderImgChanges: function (optionsData) {
        var count = optionsData.inputIds.length;
        var values = [];
        for (i = 0; i < count; i++) {
            values[i] = ''
        }
        jQuery(optionsData.ulId + ' li').each(function () {
            for (i = 0; i < count; i++) {
                values[i] += jQuery(this).find('span.' + optionsData.spanClasses[i]).html() + maple_StyleOptionsManager.separator
            }
        });
        for (i = 0; i < count; i++) {
            jQuery(optionsData.hiddenIds[i]).val(values[i])
        }
    },
    setActionButtonHandlers: function (optionsData) {
        jQuery(optionsData.ulId).delegate('.deleteButton', 'click', function () {
            jQuery(this).parent("li").remove();
            maple_StyleOptionsManager.setSliderImgChanges(optionsData)
        });
        jQuery(optionsData.ulId).delegate('.editButton', 'click', function () {
            var currentLi = jQuery(this).parent('li');
            currentLi.find('i').remove();
            currentLi.find('span').each(function (i) {
                var that = jQuery(this),
                    spanclass = that.attr('class'),
                    spanvalue = that.html();
                if (optionsData.istextarea[i]) {
                    that.replaceWith(jQuery('<textarea type="text" class="inputarea ' + spanclass + '" >' + spanvalue + '</textarea>'))
                } else {
                    that.replaceWith(jQuery('<input type="text" value="' + spanvalue + '" class="' + spanclass + '" />'))
                }
            });
            jQuery(this).replaceWith(jQuery('<div class="doneButton hover"></div>').click(function (e) {
                e.preventDefault();
                currentLi.find('input,textarea').each(function () {
                    var that = jQuery(this),
                        spanclass = that.attr('class'),
                        spanvalue = that.val();
                    var none = spanvalue === '' ? '<i>---</i>' : '';
                    that.replaceWith(jQuery('<span class="' + spanclass + '">' + spanvalue + '</span>' + none))
                });
                maple_StyleOptionsManager.setSliderImgChanges(optionsData);
                jQuery(this).replaceWith('<div class="editButton hover"></div>')
            }))
        })
    },
    makeExportFile: function(optionsData) { 
    	/* create the file */
    	//console.log('download the file');
    }
};

jQuery(window).load(function () {
    if (jQuery('#saved_box').length) {
        setTimeout('mapleOptions.removeSavedMessage()', 3000);
		setTimeout('maple_StyleOptionsManager.removeSavedMessage()', 3000);
    }
});