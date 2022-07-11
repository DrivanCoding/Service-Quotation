<?php
/**
 * The template for displaying the header search form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutenix
 */
?>

<div class="header-search-popup">
	<div <?php gutenix_container_class_by_setting( 'header_container_type' , array( 'header-search-popup__container' ) ); ?>>
		<div class="header-search-popup__inner">
			<form role="search" method="get" class="header-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<label class="header-search-form__label" for="header-search-form-id"><?php echo esc_html_x( 'What are you looking for?', 'label', 'gutenix' ) ?></label>
				<div class="header-search-form__field-wrapper">
					<i class="header-search-form__field-icon"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M12.7188 11.3125C13.1667 10.7188 13.5156 10.0625 13.7656 9.34375C14.0156 8.625 14.1406 7.86979 14.1406 7.07812C14.1406 6.09896 13.9531 5.18229 13.5781 4.32812C13.2135 3.46354 12.7083 2.71354 12.0625 2.07812C11.4271 1.43229 10.6771 0.927083 9.8125 0.5625C8.95833 0.1875 8.04688 0 7.07812 0C6.09896 0 5.17708 0.1875 4.3125 0.5625C3.45833 0.927083 2.70833 1.43229 2.0625 2.07812C1.42708 2.71354 0.921875 3.46354 0.546875 4.32812C0.182292 5.18229 0 6.09896 0 7.07812C0 8.04688 0.182292 8.96354 0.546875 9.82812C0.921875 10.6823 1.42708 11.4323 2.0625 12.0781C2.70833 12.7135 3.45833 13.2188 4.3125 13.5938C5.17708 13.9583 6.09896 14.1406 7.07812 14.1406C7.86979 14.1406 8.625 14.0156 9.34375 13.7656C10.0625 13.5156 10.7188 13.1667 11.3125 12.7188L14.2969 15.7031C14.3906 15.8073 14.5 15.8802 14.625 15.9219C14.75 15.974 14.875 16 15 16C15.125 16 15.25 15.974 15.375 15.9219C15.5 15.8802 15.6094 15.8073 15.7031 15.7031C15.901 15.5052 16 15.2708 16 15C16 14.7292 15.901 14.4948 15.7031 14.2969L12.7188 11.3125ZM7.07812 12.1406C6.36979 12.1406 5.70833 12.0104 5.09375 11.75C4.47917 11.4792 3.94271 11.1146 3.48438 10.6562C3.02604 10.1979 2.66146 9.66146 2.39062 9.04688C2.13021 8.43229 2 7.77604 2 7.07812C2 6.36979 2.13021 5.70833 2.39062 5.09375C2.66146 4.47917 3.02604 3.94271 3.48438 3.48438C3.94271 3.02604 4.47917 2.66667 5.09375 2.40625C5.70833 2.13542 6.36979 2 7.07812 2C7.77604 2 8.43229 2.13542 9.04688 2.40625C9.66146 2.66667 10.1979 3.02604 10.6562 3.48438C11.1146 3.94271 11.474 4.47917 11.7344 5.09375C12.0052 5.70833 12.1406 6.36979 12.1406 7.07812C12.1406 7.77604 12.0052 8.43229 11.7344 9.04688C11.474 9.66146 11.1146 10.1979 10.6562 10.6562C10.1979 11.1146 9.66146 11.4792 9.04688 11.75C8.43229 12.0104 7.77604 12.1406 7.07812 12.1406Z"/></svg></i>
					<input type="search" id="header-search-form-id" class="header-search-form__field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'gutenix' ) ?>" value="<?php echo get_search_query() ?>" name="s">
				</div>
			</form>
			<button class="header-search-close btn-initial"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M15.6607 0.339286C15.4345 0.113095 15.1667 0 14.8571 0C14.5476 0 14.2798 0.113095 14.0536 0.339286L8 6.39286L1.94643 0.339286C1.72024 0.113095 1.45238 0 1.14286 0C0.833333 0 0.565476 0.113095 0.339286 0.339286C0.113095 0.565476 0 0.833333 0 1.14286C0 1.45238 0.113095 1.72024 0.339286 1.94643L6.39286 8L0.339286 14.0536C0.113095 14.2798 0 14.5476 0 14.8571C0 15.1667 0.113095 15.4345 0.339286 15.6607C0.446429 15.7798 0.571429 15.869 0.714286 15.9286C0.857143 15.9762 1 16 1.14286 16C1.28571 16 1.42857 15.9762 1.57143 15.9286C1.71429 15.869 1.83929 15.7798 1.94643 15.6607L8 9.60714L14.0536 15.6607C14.1607 15.7798 14.2857 15.869 14.4286 15.9286C14.5714 15.9762 14.7143 16 14.8571 16C15 16 15.1429 15.9762 15.2857 15.9286C15.4286 15.869 15.5536 15.7798 15.6607 15.6607C15.8869 15.4345 16 15.1667 16 14.8571C16 14.5476 15.8869 14.2798 15.6607 14.0536L9.60714 8L15.6607 1.94643C15.8869 1.72024 16 1.45238 16 1.14286C16 0.833333 15.8869 0.565476 15.6607 0.339286Z"/></svg></button>
		</div>
	</div>
</div>
