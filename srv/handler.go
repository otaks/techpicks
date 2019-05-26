package tp

import (
	"log"

	"github.com/jinzhu/gorm"
	"golang.org/x/net/context"
)

type Server struct {
	db *gorm.DB
}

func (s *Server) GetPosts(ctx context.Context, req *PostRequest) (*Posts, error) {
	log.Printf("get posts")

	posts := []Post{}
	//s.db.Find()

	rows, err := s.db.Table("Post").
		Select("User.name, Pick.created_at, Post.url, Post.title, Post.description, Post.ogp_img, Post.pick_count, Post.pv_count").
		Joins("left join Pick on Pick.pick_id = Post.post_id").
		Joins("left join User on Pick.user_id = User.user_id").
		Rows()
	for rows.Next() {
		t := &Post{rows.}
		posts.add(t)
	}

	return posts
}
