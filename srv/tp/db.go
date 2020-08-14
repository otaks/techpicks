package tp

import "time"

type Post_ struct {
	post_id     int
	url         string
	title       string
	description string
	pick_count  int
	pv_count    int
	created_at  time.Time
	updated_at  time.Time
}
