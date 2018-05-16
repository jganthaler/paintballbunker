# Tutorial: E-Mail mit Dateianhang versenden

Gelegentlich besteht die Anforderung, ein Formular im Frontend zu programmieren, das ein oder mehrere Dateien entgegen nimmt und diese per E-Mail an ein oder mehrere Empfänger zustellt.

YForm bietet dieses Möglichkeit über einen Trick.

> **Hinweis**: Wir empfehlen, E-Mails möglichst ohne große Dateianhänge zu versenden. In manchen Szenarien ist es jedoch erforderlich, diese direkt als Anhang beizufügen. Für mehrere und größere Dateien gibt es [Alternativen](#alternativen).

## Voraussetzungen

1. Ein YForm-Formular (PHP-Schreibweise oder Formbuilder)
2. Ein E-Mail-Template (in System > YForm > E-Mail-Tempaltes)
3. Eine funktionierende PHPMailer-Konfiguration (in System > PHPMailer)

## Umsetzung

Dem bestehenden Formular wird ein `upload`-Valuefeld hinzugefügt, das in diesem Beispiel auf max. 10 MB begrenzt ist und nur bestimmte Dateiendungen zulässt. 

Die empfohlene Dateigrößen-Begrenzung hängt von der gewählten PHPMailer-Konfiguration, der Konfiguration des Webservers und PHP sowie von weiteren Faktoren ab - bspw. Limits und Speicherplatz des Empfänger-Postfachs.

### PHP-Schreibweise
```
$yform->setValueField('upload', array('upload','Dateianhang','100,10000','.pdf,.odt,.doc,.docx,.xls,.xlsx,.png,.jpg,.jpeg,.zip'));

$yform->setValueField('php', array('php_attach','Datei anhängen','<?php if (isset($this->params[\'value_pool\'][\'files\'])) { $this->params[\'value_pool\'][\'email_attachments\'] = $this->params[\'value_pool\'][\'files\']; } ?>'));
```

### Pipe-Schreibweise
```
upload|upload|Upload|100,10000|.pdf,.odt,.doc,.docx,.xls,.xlsx,.png,.jpg,.jpeg,.zip|

php|php|<?php if (isset($this->params['value_pool']['files'])) { $this->params['value_pool']['email_attachments'] = $this->params['value_pool']['files']; } ?>
```

Beim erfolgreichen Upload wird die Datei als dem "value pool" des Dateiuploads (`files`) übertragen in den "value pool" der E-Mail-Anhänge (`email_attachments`).

<a name="alternativen"></a>
## Alternativen

1. Datei ins Dateisystem hochladen, Link zum Download per Mail versenden und nach einer Frist von bspw. 7 Tagen wieder vom Dateisystem löschen.
2. Externe Anbieter wie bspw. [wetransfer.com](https://wetransfer.com) (Datenschutz beachten!)
3. Cloud-Lösungen, wie bspw. eine Dropbox, OwnCloud oder NextCloud-Freigabe (Datenschutz beachten!)

## Credits

Thomas Blum, @tbaddade 
Alexander Walther, @alexplusde