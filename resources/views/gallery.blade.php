@extends('app')
<!--//TODO: Multiple see bellow
Implement height based auto scaling
Possibly add transitions to pc version
Add a database connection
Work out auth registaration emails etc
Add method to upload to amazon
Add a playlist option, play button etc
Thumbnails down the bottom (docked as before?)
Website layout and design
Management system
-->
@section('head')
    <link rel="stylesheet" href="{{ asset('css/photoswipe.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-skin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
@endsection

@section('content')

        <h2>First gallery:</h2>

        <div class="my-simple-gallery" itemscope itemtype="http://schema.org/ImageGallery">

            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="https://s3-eu-west-1.amazonaws.com/www.kacprzyk.co.uk/gallery/20140705--59.jpg" itemprop="contentUrl" data-size="4223x2815">
                    <img src="https://s3-eu-west-1.amazonaws.com/www.kacprzyk.co.uk/gallery/thumbnails/20140705--59.jpg" itemprop="thumbnail" alt="Image description" />
                </a>
                <figcaption itemprop="caption description">Image caption  1</figcaption>

            </figure>

            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="https://s3-eu-west-1.amazonaws.com/www.kacprzyk.co.uk/gallery/20140705--62.jpg" itemprop="contentUrl" data-size="4095x2730">
                    <img src="https://s3-eu-west-1.amazonaws.com/www.kacprzyk.co.uk/gallery/thumbnails/20140705--62.jpg" itemprop="thumbnail" alt="Image description" />
                </a>
                <figcaption itemprop="caption description">Image caption 2</figcaption>
            </figure>

            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="https://s3-eu-west-1.amazonaws.com/www.kacprzyk.co.uk/gallery/_MG_0102.jpg" itemprop="contentUrl" data-size="5616x3744">
                    <img src="https://s3-eu-west-1.amazonaws.com/www.kacprzyk.co.uk/gallery/thumbnails/_MG_0102.jpg" itemprop="thumbnail" alt="Image description" />
                </a>
                <figcaption itemprop="caption description">Image caption 3</figcaption>
            </figure>

            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="https://s3-eu-west-1.amazonaws.com/www.kacprzyk.co.uk/gallery/_MG_0339.jpg" itemprop="contentUrl" data-size="5616x3744">
                    <img src="https://s3-eu-west-1.amazonaws.com/www.kacprzyk.co.uk/gallery/thumbnails/_MG_0339.jpg" itemprop="thumbnail" alt="Image description" />
                </a>
                <figcaption itemprop="caption description">Image caption 4</figcaption>
            </figure>


        </div>

        <h2>Second gallery:</h2>

        <div class="my-simple-gallery" itemscope itemtype="http://schema.org/ImageGallery">



            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="https://farm2.staticflickr.com/1043/5186867718_06b2e9e551_b.jpg" itemprop="contentUrl" data-size="964x1024">
                    <img src="https://farm2.staticflickr.com/1043/5186867718_06b2e9e551_m.jpg" itemprop="thumbnail" alt="Image description" />
                </a>
                <figcaption itemprop="caption description">Image caption 2.1</figcaption>
            </figure>

            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="https://farm7.staticflickr.com/6175/6176698785_7dee72237e_b.jpg" itemprop="contentUrl" data-size="1024x683">
                    <img src="https://farm7.staticflickr.com/6175/6176698785_7dee72237e_m.jpg" itemprop="thumbnail" alt="Image description" />
                </a>
                <figcaption itemprop="caption description">Image caption 2.2</figcaption>
            </figure>

            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="https://farm6.staticflickr.com/5023/5578283926_822e5e5791_b.jpg" itemprop="contentUrl" data-size="1024x768">
                    <img src="https://farm6.staticflickr.com/5023/5578283926_822e5e5791_m.jpg" itemprop="thumbnail" alt="Image description" />
                </a>
                <figcaption itemprop="caption description">Image caption 2.3</figcaption>
            </figure>


        </div>

        <h2>Third gallery:</h2>

        <div class="my-simple-gallery" itemscope itemtype="http://schema.org/ImageGallery">

            @foreach(Photo::find('*') as $uzer)
                alert(1);

            @endforeach


        </div>
<!-- Core swipe FUNCTION ###################################################################################################################-->
        <!-- Root element of PhotoSwipe. Must have class pswp. -->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

            <!-- Background of PhotoSwipe.
                 It's a separate element as animating opacity is faster than rgba(). -->
            <div class="pswp__bg"></div>

            <!-- Slides wrapper with overflow:hidden. -->
            <div class="pswp__scroll-wrap">

                <!-- Container that holds slides.
                    PhotoSwipe keeps only 3 of them in the DOM to save memory.
                    Don't modify these 3 pswp__item elements, data is added later on. -->
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>

                <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                <div class="pswp__ui pswp__ui--hidden">

                    <div class="pswp__top-bar">

                        <!--  Controls are self-explanatory. Order can be changed. -->

                        <div class="pswp__counter"></div>

                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                        <button class="pswp__button pswp__button--share" title="Share"></button>

                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                        <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                        <!-- element will get class pswp__preloader--active when preloader is running -->
                            <div class="pswp__preloader">
                                <div class="pswp__preloader__icn">
                                    <div class="pswp__preloader__cut">
                                        <div class="pswp__preloader__donut"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                            <div class="pswp__share-tooltip"></div>
                        </div>

                        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                        </button>

                        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                        </button>

                        <div class="pswp__caption">
                            <div class="pswp__caption__center"></div>
                        </div>

                    </div>

                </div>

            </div>
@endsection

@section('script')
    <script src="{{ asset('js/photoswipe.min.js') }}"></script>
    <script src="{{ asset('js/photoswipe-ui-default.min.js') }}"></script>
@endsection

@section('end')
    <script>
    var initPhotoSwipeFromDOM = function(gallerySelector) {

        // parse slide data (url, title, size ...) from DOM elements
        // (children of gallerySelector)
        var parseThumbnailElements = function(el) {
        var thumbElements = el.childNodes,
        numNodes = thumbElements.length,
        items = [],
        figureEl,
        childElements,
        linkEl,
        size,
        item;

        for(var i = 0; i < numNodes; i++) {


        figureEl = thumbElements[i]; // <figure> element

        // include only element nodes
        if(figureEl.nodeType !== 1) {
        continue;
        }

    linkEl = figureEl.children[0]; // <a> element

    size = linkEl.getAttribute('data-size').split('x');

    // create slide object
    item = {
        src: linkEl.getAttribute('href'),
        w: parseInt(size[0], 10),
        h: parseInt(size[1], 10)
        };



    if(figureEl.children.length > 1) {
        // <figcaption> content
        item.title = figureEl.children[1].innerHTML;
        }

    if(linkEl.children.length > 0) {
        // <img> thumbnail element, retrieving thumbnail url
        item.msrc = linkEl.children[0].getAttribute('src');
        }

    item.el = figureEl; // save link to element for getThumbBoundsFn
    items.push(item);
    }

    return items;
    };

    // find nearest parent element
    var closest = function closest(el, fn) {
        return el && ( fn(el) ? el : closest(el.parentNode, fn) );
        };

    // triggers when user clicks on thumbnail
    var onThumbnailsClick = function(e) {
        e = e || window.event;
        e.preventDefault ? e.preventDefault() : e.returnValue = false;

        var eTarget = e.target || e.srcElement;

        var clickedListItem = closest(eTarget, function(el) {
        return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
        });

    if(!clickedListItem) {
        return;
        }


    // find index of clicked item
    var clickedGallery = clickedListItem.parentNode,
    childNodes = clickedListItem.parentNode.childNodes,
    numChildNodes = childNodes.length,
    nodeIndex = 0,
    index;

    for (var i = 0; i < numChildNodes; i++) {
            if(childNodes[i].nodeType !== 1) {
            continue;
            }

        if(childNodes[i] === clickedListItem) {
            index = nodeIndex;
            break;
            }
        nodeIndex++;
        }



        if(index >= 0) {
            openPhotoSwipe( index, clickedGallery );
            }
        return false;
        };

        // parse picture index and gallery index from URL (#&pid=1&gid=2)
        var photoswipeParseHash = function() {
            var hash = window.location.hash.substring(1),
            params = {};

        if(hash.length < 5) {
                return params;
                }

            var vars = hash.split('&');
            for (var i = 0; i < vars.length; i++) {
                    if(!vars[i]) {
                    continue;
                    }
                var pair = vars[i].split('=');
                if(pair.length < 2) {
                        continue;
                        }
                    params[pair[0]] = pair[1];
                    }

                    if(params.gid) {
                        params.gid = parseInt(params.gid, 10);
                        }

                    if(!params.hasOwnProperty('pid')) {
            return params;
        }
        params.pid = parseInt(params.pid, 10);
        return params;
    };

    var openPhotoSwipe = function(index, galleryElement, disableAnimation) {
        var pswpElement = document.querySelectorAll('.pswp')[0],
            gallery,
            options,
            items;

        items = parseThumbnailElements(galleryElement);

        // define options (if needed)
        options = {
            index: index,

            // define gallery index (for URL)
            galleryUID: galleryElement.getAttribute('data-pswp-uid'),

            getThumbBoundsFn: function(index) {
                // See Options -> getThumbBoundsFn section of docs for more info
                var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                    pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                    rect = thumbnail.getBoundingClientRect();

                return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
            },

            // history & focus options are disabled on CodePen
            // remove these lines in real life:
           history: false,
           focus: false

        };

        if(disableAnimation) {
            options.showAnimationDuration = 0;
        }

        // Pass data to PhotoSwipe and initialize it
        gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.init();
    };

    // loop through all gallery elements and bind events
    var galleryElements = document.querySelectorAll( gallerySelector );

    for(var i = 0, l = galleryElements.length; i < l; i++) {
        galleryElements[i].setAttribute('data-pswp-uid', i+1);
        galleryElements[i].onclick = onThumbnailsClick;
    }

    // Parse URL and open gallery if it contains #&pid=3&gid=1
    var hashData = photoswipeParseHash();
    if(hashData.pid > 0 && hashData.gid > 0) {
        openPhotoSwipe( hashData.pid - 1 ,  galleryElements[ hashData.gid - 1 ], true );
    }
};

// execute above function
initPhotoSwipeFromDOM('.my-simple-gallery');
    </script>
@endsection