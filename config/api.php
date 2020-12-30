<?php

namespace mauricerenck\Komments;

use Xml;
use File;
use f;
use Structure;

return [
    'routes' => [
        [
            'pattern' => 'komments/version',
            'action' => function () {
                $string = f::read(__DIR__ . '/../composer.json');
                return $string;
            }
        ],
        [
            'pattern' => 'komments/queued',
            'action' => function () {
                $pendingKomments = [];
                $collection = site()->index();
                $komments = new Structure();
                $key = 0;

                foreach ($collection as $item) {
                    if ($item->kommentsInbox()->isNotEmpty()) {
                        foreach ($item->kommentsInbox()->yaml() as $komment) {
                            $komment['spamlevel'] = (isset($komment['spamlevel'])) ? $komment['spamlevel'] : 0; // backward compatiblity

                            if (($komment['status'] === 'false' || $komment['status'] === false) && (integer)$komment['spamlevel'] === 0) {
                                $pendingKomments[] = [
                                    'id' => (isset($komment['kid']) && !empty($komment['kid'])) ? $komment['kid'] : md5($komment['author'] . $komment['published']),
                                    'author' => $komment['author'],
                                    'authorurl' => $komment['authorurl'],
                                    'komment' => $komment['komment'],
                                    'kommentType' => (isset($komment['kommenttype'])) ? $komment['kommenttype'] : 'komment', // backward compatiblity
                                    'image' => $komment['avatar'],
                                    'title' => (string) $item->title(),
                                    'url' => $item->panelUrl(),
                                    'spamlevel' => (isset($komment['spamlevel'])) ? $komment['spamlevel'] : 0,
                                    'status' => $komment['status'],
                                ];
                            }
                        }
                    }
                }

                return json_encode($pendingKomments);
            }
        ],
        [
            'pattern' => 'komments/spam',
            'action' => function () {
                $spamKomments = [];
                $collection = site()->index();
                $komments = new Structure();
                $key = 0;

                foreach ($collection as $item) {
                    if ($item->kommentsInbox()->isNotEmpty()) {
                        foreach ($item->kommentsInbox()->yaml() as $komment) {
                            $komment['spamlevel'] = (isset($komment['spamlevel'])) ? $komment['spamlevel'] : 0; // backward compatiblity
                            if ((integer)$komment['spamlevel'] > 0) {
                                $spamKomments[] = [
                                    'author' => $komment['author'],
                                    'komment' => $komment['komment'],
                                    'kommentType' => (isset($komment['kommenttype'])) ? $komment['kommenttype'] : 'komment', // backward compatiblity
                                    'image' => $komment['avatar'],
                                    'title' => (string) $item->title(),
                                    'url' => $item->panelUrl(),
                                ];
                            }
                        }
                    }
                }

                return json_encode($spamKomments);
            }
        ],
    ]
];
