jQuery(document).ready(function($) {
    // Variables
    const header = $('header');
    const footer = $('footer');

    // Burger menu
    let burgerIcon = $(".burger-icon");
    if (burgerIcon.length > 0) {
        burgerIcon.on('click', function () {
            let headerWrapper = $(this).closest('.header-wrapper');
            if (headerWrapper.hasClass('active')) {
                $('body').removeClass('lock');
                headerWrapper.removeClass('active');
            } else {
                $('body').addClass('lock');
                headerWrapper.addClass('active');
            }
        });
    }

    // Menu
    let menu = $('.menu-list');
    if (menu.length > 0) {
        let menuLinks = menu.find('a');
        menuLinks.on('click', function () {
            $('body').removeClass('lock');
            $(this).closest('.header-wrapper').removeClass('active');
        })
    }

    // Mega Menu
    let menuItemsWithChildren = $('.menu-list > .menu-item-has-children');
    if (menuItemsWithChildren.length > 0) {
        menuItemsWithChildren.each(function () {
            let item = $(this);

            // Call the function to generate icon for menu item with children
            generateIcon(item);

            let subMenuItemIcon = item.find('> .icon');
            let subMenuItemLinks = item.find('.sub-menu a');
            let subMenu = item.find('> ul.sub-menu');

            if (window.innerWidth > 1023) {
                item.on('mouseenter', function () {
                    item.addClass('active');
                    $('body').addClass('overlay');
                });

                item.on('mouseleave', function () {
                    item.removeClass('active');
                    $('body').removeClass('overlay');
                });

                subMenuItemLinks.on('click', function () {
                    item.removeClass('active');
                    $('body').removeClass('overlay');
                });
            } else {
                subMenuItemIcon.on('click', function () {
                    item.toggleClass('active');
                    subMenu.slideToggle(400);
                });

                subMenuItemLinks.on('click', function () {
                    item.toggleClass('active');
                    subMenu.slideToggle(400);
                });
            }

            // Detect clicks outside the active menu item (only for desktop)
            $(window).on('resize', detectClickOutside);
            detectClickOutside();

            function detectClickOutside() {
                if (window.innerWidth > 1023) {
                    $(document).on('click.detectOutside', function (event) {
                        if (!$(event.target).closest('.menu-item-has-children').length) {
                            item.removeClass('active');
                            $('body').removeClass('overlay');
                        }
                    });
                } else {
                    $(document).off('click.detectOutside');
                }
            }

            $('body').on('mousemove', function (event) {
                if (!$(event.target).closest('.menu-item-has-children').length) {
                    // Mouse is not over any menu item, remove the overlay class
                    $('body').removeClass('overlay');
                }
            });
        })

        function generateIcon(menuItem) {
            let iconArrow = `
                <span class="icon">    
                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.778809 1.25L6.52884 7L12.7212 1.25" stroke="currentColor" stroke-width="1.23847"/>
                    </svg>
                </span>
            `;

            menuItem.append(iconArrow);
        }
    }

    // Scroll to anchor
    var initialTarget = $('#_' + window.location.hash.replace('#', ''));
    $(document).ready(function () {
        if (initialTarget.length) {
            $.scrollTo(initialTarget);
        }
    })

    let anchorLinks = $('a[href^="#"]');
    if (anchorLinks.length > 0) {
        anchorLinks.on('click', function (e) {
            e.preventDefault();

            let targetHash = $(this).attr('href').split("#")[1];
            if (targetHash.startsWith('popup')) {
                return;
            }

            let target = $('#_' + targetHash);
            if (target.length) {
                $.scrollTo(target);
            }
        });
    }

    /* ---------- Global ---------- */

    updateHeaderOnScroll();
    $(window).on('scroll', function () {
        updateHeaderOnScroll();
    });

    // Tabs
    let tabsBlocks = $('.tabs');
    if (tabsBlocks.length > 0) {
        tabsBlocks.each(function () {
            let tabBlock = $(this);
            let tabs = tabBlock.find('.tab');
            let tabsContent = tabBlock.siblings('.tabs-content');

            tabs.on('click', function () {
                let tab = $(this);
                let tabTargetID = tab.attr('data-tab');
                let tabTarget = tabsContent.find('#' + tabTargetID);

                tab.siblings().removeClass('active');
                tab.addClass('active');
                tabTarget.siblings().removeClass('active');
                tabTarget.addClass('active');

                // $.scrollTo(tabBlock);
            })

            let tabFirst = tabs.first();
            let tabFirstTargetID = tabFirst.attr('data-tab');
            let tabFirstTarget = tabsContent.find('#' + tabFirstTargetID);

            tabFirst.addClass('active');
            tabFirstTarget.addClass('active');
        })
    }

    // FAQ block
    let faq = $('.faq');
    if (faq.length > 0) {
        let faqToggles = faq.find('.faq-item-toggle');
        faqToggles.on('click', function () {
            $(this).toggleClass('active');
            $(this).siblings('.faq-item-toggle-text').slideToggle();
        })
    }

    /* ---------- Global - END ---------- */


    /* ---------- Sliders ---------- */

    // Sliders - Blog
    let blogSlider = $('.blog.swiper');
    if (blogSlider.length > 0) {
        blogSlider = new Swiper('.blog.swiper', {
            loop: true,
            slidesPerView: 1.9,
            spaceBetween: 20,
            speed: 1000,
            navigation: {
                nextEl: '#blog .swiper-controls .swiper-arrow-next',
                prevEl: '#blog .swiper-controls .swiper-arrow-prev',
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                600: {
                    slidesPerView: 1.5,
                },
                767: {
                    slidesPerView: 0.95,
                },
                1024: {
                    slidesPerView: 1.9,
                }
            },
        });
    }

    /* ---------- Sliders - END ---------- */


    /* ---------- Popups ---------- */

    $(document).on('click', 'a[href^="#popup"]', function (e) {
        e.preventDefault();
        
        let popupTarget = $(this).attr('href');

        $.magnificPopup.open({
            items: {
                src: popupTarget
            },
            type: 'inline',
            midClick: true,
            enableEscapeKey: true,
            preloader: false,
            removalDelay: 300,
            mainClass: 'mfp-zoom-in',
            callbacks: {
                open: function () {
                    $('.mfp-close').remove();
                    $('body').addClass('lock');
                },
                close: function () {
                    $('body').removeClass('lock');
                }
            }
        });
    });

    $(document).on('click', '.popup-close', function () {
        $.magnificPopup.close();
    });

    /* ---------- Popups - END ---------- */


    /* ---------- Contact Form ---------- */

    // Switching class "filled" for fields
    function switchFilled(field, fieldWrap) {
        if (field.val().length > 0) {
            fieldWrap.addClass('filled');
        } else {
            fieldWrap.removeClass('filled');
        }
    }

    let formFields = $('.form-field input:not([type="checkbox"]), .form-field textarea');
    formFields.each(function () {
        switchFilled($(this), $(this).closest('.form-field'));
    })

    $(document).on('input', '.form-field input:not([type="checkbox"]), .form-field textarea', function () {
        switchFilled($(this), $(this).closest('.form-field'));
    })

    // Phone input mask
    let phoneFields = $('input[type="tel"]');
    if (phoneFields.length > 0) {
        phoneFields.each(function() {
            $(this).inputmask({"mask": "+7 (999) 999-99-99"});
        })
    }

    $.generateCustomSelect = function () {
        const selectFields = $('.form-field--select');

        if (selectFields.length > 0) {
            selectFields.each(function () {
                const selectField = $(this);

                const selectFieldLabel = selectField.find('label');
                const initialSelect = selectField.find('select');
                const options = initialSelect.find('option');

                let customSelectHTML = `
                    <div class="custom-select body-3">
                        <div class="custom-select__options">
                `;

                // Loop through the real select options and dynamically generate custom options
                options.each(function () {
                    const value = $(this).val();
                    const text = $(this).text();
                    customSelectHTML += `<span class="custom-select__option" data-value="${value}">${text}</span>`;
                });

                customSelectHTML += `
                        </div>
                    </div>
                `;

                // Append the generated custom select after label
                selectFieldLabel.after(customSelectHTML);

                // Hide the original select field
                initialSelect.hide();

                let customSelectLabelArrow = `
                    <span class="icon">    
                        <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.778809 1.25L6.52884 7L12.7212 1.25" stroke="currentColor" stroke-width="1.23847"/>
                        </svg>
                    </span>
                `;

                selectFieldLabel.append(customSelectLabelArrow);

                // Event listeners for custom select
                selectFieldLabel.on('click', function () {
                    selectField.toggleClass('expanded');
                });

                const customSelect = selectField.find('.custom-select');
                const customSelectOptions = customSelect.find('.custom-select__option');

                customSelectOptions.on('click', function () {
                    var value = $(this).data('value');
                    var text = $(this).text();

                    // Update the trigger to show the selected option
                    selectFieldLabel.find('.text').text(text);

                    // Hide the custom select
                    selectField.removeClass('expanded');

                    // Set the value of the hidden original select
                    initialSelect.val(value).trigger('change');
                });

                // Hide the custom options when clicking outside
                $(document).on('click', function (e) {
                    if ((!$(e.target).closest('.custom-select').length && !$(e.target).closest('.form-field--select').length) || $(e.target).hasClass('form-field--select')) {
                        selectFields.removeClass('expanded');
                    }
                });
            })
        }
    }

    // Call the function to generate the custom select
    $.generateCustomSelect();

    /* ---------- Contact Form - END ---------- */


    /* ---------- Functions ---------- */

    function getHeaderHeight() {
        return header.height();
    }

    function getWindowWidth() {
        return $(window).width();
    }

    function updateHeaderOnScroll() {
        let scrollOffset = $(window).scrollTop();
        if (scrollOffset > 0) {
            header.addClass('scroll');
        } else {
            header.removeClass('scroll');
        }
    }

    // Global functions
    $.isTablet = function() {
        return 767 <= getWindowWidth() && getWindowWidth() <= 1023;
    }

    $.isMobile = function() {
        return getWindowWidth() < 767;
    }

    $.scrollTo = function (element, speed) {
        const scrollPosition = Math.round(element.offset().top - getHeaderHeight());
        const scrollSpeed = speed || 600;
        $('html').animate({
            scrollTop: scrollPosition
        }, scrollSpeed);
    }

    /* ---------- Functions - END ---------- */
})