                <tr class="table__line">
                    <td class="table__item table__item_align_center">@@flagged@@</span>
                    </td>

                    <td class="table__item table__item_full-width_yes">@@name@@</td>
                    <td class="table__item">@@size@@</td>
                    <td class="table__item">@@ctime@@</td>
                    <td class="table__item">@@mtime@@</td>
                    <td class="table__item">@@owner@@</td>
                    <td class="table__item">@@group@@</td>

                    <td class="table__item">
                        <div class="button-group">
                            <div class="popup popup_visibility_hidden i-bem" data-bem="{&quot;popup&quot;:{&quot;0&quot;:&quot;t&quot;,&quot;1&quot;:&quot;r&quot;,&quot;2&quot;:&quot;u&quot;,&quot;3&quot;:&quot;e&quot;}}">
                                <div class="popup__close"></div>
                                <div class="popup__content">
                                    <table class="table">
                                        <tr class="table__line">
                                            <td class="table__item table__item_bold_yes">MD5</td>
                                            <td class="table__item">@@md5@@</td>                                            
                                            <td class="table__item table__item_bold_yes">Snippet</td>
                                            <td class="table__item">@@snippet@@</td>                                            
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <button class="button button_more_yes i-bem" data-bem="{&quot;button&quot;:{}}" role="button" type="button">
                                <div class="button__arrow"></div>
                            </button>
                            <button id="q_@@uid@@" class="button button_size_s i-bem" data-bem="{&quot;button&quot;:{}}" role="button" onclick="return add_quarantine('@@uid@@', '@@name@@')"><span class="button__text">Quarantine</span>
                            </button>
                            <button id="d_@@uid@@" class="button button_size_s i-bem" data-bem="{&quot;button&quot;:{}}" role="button" onclick="return add_delete('@@uid@@', '@@name@@')"><span class="button__text">Delete</span>
                            </button>
                        </div>
                    </td>
                </tr>