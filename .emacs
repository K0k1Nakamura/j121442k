

;;---------------------------------------------------------------------------------------
;; Please don't remove this part        -------------------------------------------------
;;                                                                                    ;--
(set-frame-height (next-frame) 52)                                                    ;--
(set-frame-width (next-frame) 52)                                                     ;--
                                                                                      ;--
;; メニューバーを非表示0 表示1                                                        ;--
(menu-bar-mode 1)                                                                     ;--
;; ツールバーを非表示0 表示1                                                          ;--
(tool-bar-mode 1)                                                                     ;--
                                                                                      ;--
(setq ps-multibyte-buffer 'non-latin-printer)                                         ;--
(require 'ps-mule)                                                                    ;--
(defalias 'ps-mule-header-string-charsets 'ignore)                                    ;--
(tool-bar-add-item "psprint" 'ps-print-buffer 'psprintbuffer :help "PS print buffer") ;--
                                                                                      ;--
;;---------------------------------------------------------------------------------------
;;---------------------------------------------------------------------------------------
