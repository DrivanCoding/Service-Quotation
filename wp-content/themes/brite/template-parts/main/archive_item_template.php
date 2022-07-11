<div class="<?php brite_print_archive_entry_class("h-column h-column-container d-flex  masonry-item style-107-outer style-local-1846-m4-outer");?>" data-masonry-width="<?php brite_print_masonry_col_class(true); ?>">
  <div data-colibri-id="1846-m4" class="d-flex h-flex-basis h-column__inner h-px-lg-0 h-px-md-0 h-px-0 v-inner-lg-0 v-inner-md-0 v-inner-0 style-107 style-local-1846-m4 h-overflow-hidden position-relative">
    <div class="w-100 h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
      <div data-href="<?php the_permalink(); ?>" data-colibri-component="link" data-colibri-id="1846-m5" class="colibri-post-thumbnail <?php brite_post_thumbnail_classes(); ?> style-108 style-local-1846-m5 h-overflow-hidden position-relative h-element">
        <div class="h-global-transition-all colibri-post-thumbnail-shortcode style-dynamic-1846-m5-height">
          <?php brite_post_thumbnail(array (
            'link' => true,
          )); ?>
        </div>
        <div class="colibri-post-thumbnail-content align-items-lg-center align-items-md-center align-items-center flex-basis-100">
          <div class="w-100 h-y-container"></div>
        </div>
      </div>
      <div data-colibri-id="1846-m6" class="h-row-container gutters-row-lg-2 gutters-row-md-2 gutters-row-2 gutters-row-v-lg-2 gutters-row-v-md-2 gutters-row-v-2 style-109 style-local-1846-m6 position-relative">
        <div class="h-row justify-content-lg-center justify-content-md-center justify-content-center align-items-lg-stretch align-items-md-stretch align-items-stretch gutters-col-lg-2 gutters-col-md-2 gutters-col-2 gutters-col-v-lg-2 gutters-col-v-md-2 gutters-col-v-2">
          <div class="h-column h-column-container d-flex h-col-lg-auto h-col-md-auto h-col-auto style-110-outer style-local-1846-m7-outer">
            <div data-colibri-id="1846-m7" class="d-flex h-flex-basis h-column__inner h-px-lg-2 h-px-md-2 h-px-2 v-inner-lg-2 v-inner-md-2 v-inner-2 style-110 style-local-1846-m7 position-relative">
              <div class="w-100 h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
                <div data-colibri-id="1846-m8" class="h-blog-title style-111 style-local-1846-m8 position-relative h-element">
                  <div class="h-global-transition-all">
                    <?php brite_post_title(array (
                      'heading_type' => 'h4',
                      'classes' => 'colibri-word-wrap',
                    )); ?>
                  </div>
                </div>
                <div data-colibri-id="1846-m9" class="style-112 style-local-1846-m9 position-relative h-element">
                  <div class="h-global-transition-all">
                    <?php brite_post_excerpt(array (
                      'max_length' => 17,
                    )); ?>
                  </div>
                </div>
                <div data-colibri-id="1846-m10" class="h-row-container gutters-row-lg-0 gutters-row-md-0 gutters-row-0 gutters-row-v-lg-0 gutters-row-v-md-0 gutters-row-v-0 style-113 style-local-1846-m10 position-relative">
                  <div class="h-row justify-content-lg-center justify-content-md-center justify-content-center align-items-lg-stretch align-items-md-stretch align-items-stretch gutters-col-lg-0 gutters-col-md-0 gutters-col-0 gutters-col-v-lg-0 gutters-col-v-md-0 gutters-col-v-0">
                    <div class="h-column h-column-container d-flex h-col-lg h-col-md h-col style-114-outer style-local-1846-m11-outer">
                      <div data-colibri-id="1846-m11" class="d-flex h-flex-basis h-column__inner h-px-lg-0 h-px-md-0 h-px-0 v-inner-lg-0 v-inner-md-0 v-inner-0 style-114 style-local-1846-m11 position-relative">
                        <div class="w-100 h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-center align-self-md-center align-self-center">
                          <?php if ( \ColibriWP\Theme\Core\Hooks::prefixed_apply_filters( 'show_post_meta', true ) ): ?>
                          <div data-colibri-id="1846-m12" class="h-blog-meta style-75 style-local-1846-m12 position-relative h-element">
                            <div name="1" class="metadata-item">
                              <span class="metadata-prefix">
                                <?php esc_html_e('by','brite'); ?>
                              </span>
                              <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
                                <span class="h-svg-icon">
                                  <!--Icon by Icons8 Line Awesome (https://icons8.com/line-awesome)-->
                                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="user" viewBox="0 0 512 545.5">
                                    <path d="M240 112c61.666 0 112 50.334 112 112 0 38.54-19.698 72.834-49.5 93 57.074 24.477 97.5 81.1 97.5 147h-32c0-70.89-57.11-128-128-128s-128 57.11-128 128H80c0-65.9 40.426-122.522 97.5-147-29.802-20.166-49.5-54.46-49.5-93 0-61.666 50.334-112 112-112zm0 32c-44.372 0-80 35.628-80 80s35.628 80 80 80 80-35.628 80-80-35.628-80-80-80z"></path>
                                  </svg>
                                </span>
                                <?php echo esc_html(get_the_author_meta( 'display_name', get_the_author_meta( 'ID' ) )); ?>
                              </a>
                            </div>
                          </div>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                    <div class="h-column h-column-container d-flex h-col-lg-auto h-col-md-auto h-col-auto style-116-outer style-local-1846-m13-outer">
                      <div data-colibri-id="1846-m13" class="d-flex h-flex-basis h-column__inner h-px-lg-0 h-px-md-0 h-px-0 v-inner-lg-0 v-inner-md-0 v-inner-0 style-116 style-local-1846-m13 position-relative">
                        <div class="w-100 h-y-container h-column__content h-column__v-align flex-basis-auto align-self-lg-center align-self-md-center align-self-center">
                          <div data-colibri-id="1846-m14" class="h-x-container style-117 style-local-1846-m14 position-relative h-element">
                            <div class="h-x-container-inner style-dynamic-1846-m14-group">
                              <span class="h-button__outer style-143-outer style-local-1846-m15-outer d-inline-flex h-element">
                                <a h-use-smooth-scroll="true" href="<?php the_permalink(); ?>" data-colibri-id="1846-m15" class="d-flex w-100 align-items-center h-button justify-content-lg-center justify-content-md-center justify-content-center style-143 style-local-1846-m15 position-relative">
                                  <span>
                                    <?php esc_html_e('read more...','brite'); ?>
                                  </span>
                                </a>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
