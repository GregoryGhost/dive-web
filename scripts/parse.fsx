#r "FSharp.Data.dll"
open FSharp.Data
open System.IO

let path = Path.Combine(__SOURCE_DIRECTORY__,"index.html")
// let path1 = Path.Combine(__SOURCE_DIRECTORY__,"index1.html")
let targetDir = Path.Combine(__SOURCE_DIRECTORY__,"images/")
let results = HtmlDocument.Load(path)
let checkImgInDir source = seq{
        for dir in Directory.EnumerateDirectories(targetDir) do
            for img in Directory.EnumerateFiles(dir,source) do
                yield Some (DirectoryInfo(dir).Name)
    }
let links = 
    results.Descendants["img"]
    |> Seq.choose (fun x -> 
        x.TryGetAttribute("src")
        |> Option.map (fun a -> 
            let rDir = 
                try
                    Some (a.Value() |> checkImgInDir |> Seq.head)
                with
                | :? DirectoryNotFoundException -> None
            let replace = 
                match rDir with
                | Some imgDir -> Some (Path.Combine("images/"+ imgDir.Value, a.Value()))
                | None -> None 
            (a.Value(), replace))
    ) |> Seq.toArray
let replaceSrc =
    let mutable str = results.ToString()
    for s in links do
        let (source, replace) = s
        if replace.IsSome then
            str <- str.Replace(source, replace.Value)
    str
File.WriteAllText(path, replaceSrc)