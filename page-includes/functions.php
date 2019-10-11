<?php
   function text_validation (string $input): bool {
      $pattern = '/^[a-zA-Z ]{3,50}$/';
      if (!empty($input)) {
         $input = trim($input);
         if (preg_match($pattern, $input) === 1) {
            return true;
         }
      }
      return false;
   }

   function email_validation (string $input): bool {
      $pattern = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
      if (!empty($input)) {
         $input = trim($input);
         if (preg_match($pattern, $input) === 1) {
            $is_sanitize = filter_var($input, FILTER_SANITIZE_EMAIL);
            if ($is_sanitize) return true;
         }
      }
      return false;
   }

   function gender_validation (string $input): bool {
      $pattern = '/^[f|m]$/';
      if (!empty($input)) {
         $input = trim($input);
         if (preg_match($pattern, $input) === 1) {
            return true;
         }
      }
      return false;
   }

   function countries_validation (string $input): bool {
      $pattern = '/^[A-Z]{2}$/';
      if (!empty($input)) {
         $input = trim($input);
         if (preg_match($pattern, $input) === 1) {
            return true;
         }
      }
      return false;
   }

   function subject_validation (string $input): bool {
      $pattern = '/^[0-2]$/';
      if (!empty($input)) {
         $input = trim($input);
         if (preg_match($pattern, $input) === 1) {
            return true;
         }
      }
      return false;
   }

   function add_invalid_class (bool $is_valid): string {
      if ($is_valid) return 'is-valid';
      return 'is-invalid';
   }

   // function input_filter (string $input): string {

   // }

   function var_log ($var): void {
      echo '<pre>';
      var_dump($var);
      echo '</pre>';
   }
?>