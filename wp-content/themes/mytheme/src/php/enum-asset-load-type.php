<?php
/**
 * Asset Load Types
 *
 * @package KJRoelke
 */

namespace KJR;

/** Strict Definition of what type of assets to enqueue */
enum Asset_Load_Type {
	case style;
	case script;
	case both;
}
