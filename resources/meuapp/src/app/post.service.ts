import { Injectable } from '@angular/core';
import { HttpClient, HttpEventType } from '@angular/common/http';
import { Post } from './post';

@Injectable({
    providedIn: 'root'
})
export class PostService {

    public posts: Post[] = []

    constructor(private http: HttpClient) {
        this.http.get("http://localhost/laravel/public/api").subscribe((posts: any[]) => posts.forEach(e => this.posts.push(new Post(e.nome, e.titulo, e.subtitulo, e.email, e.mensagem, e.arquivo, e.id, e.likes))))
    }

    salvar(post: Post, file: File) {
        const uploadData = new FormData()
        uploadData.append("nome", post.nome)
        uploadData.append("email", post.email)
        uploadData.append("titulo", post.titulo)
        uploadData.append("subtitulo", post.subtitulo)
        uploadData.append("mensagem", post.mensagem)
        uploadData.append("arquivo", file, file.name)
        this.http.post("http://localhost/laravel/public/api", uploadData, {observe: 'events'}).subscribe((event: any) => {
            if(event.type == HttpEventType.Response){
                let e: any = event.body
                this.posts.push(new Post(e.nome, e.titulo, e.subtitulo, e.email, e.mensagem, e.arquivo, e.id, e.likes))
            } 
        })
    }

    like(id: number) {
        this.http.get(`http://localhost/laravel/public/api/like/${id}`).subscribe((event: any) => {
            let p = this.posts.find(p => p.id == id)
            p.likes = event.likes
        })
    }

    apagar(id: number) {
        this.http.delete(`http://localhost/laravel/public/api/${id}`).subscribe(event => {
            let i = this.posts.findIndex(p => p.id == id)
            if(i >= 0)
                this.posts.splice(i, 1)
        })
    }

}
